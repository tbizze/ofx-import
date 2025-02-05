<?php

namespace App\Imports;

use App\Models\TransactionNew;
use Carbon\Carbon;
use DateTime;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class TransactionNewImport implements ToModel, WithHeadingRow
{
    /**
     * Cria um novo modelo de transação a partir de uma linha de dados.
     *
     * @param array{
     *     id_da_transacao: string,
     *     data_da_transacao: string,
     *     operacao: string,
     *     bandeira: string,
     *     forma_de_pagamento: string,
     *     valor_bruto: string|float,
     *     valor_liquido: string|float,
     *     valor_taxa: string|float,
     *     status: string
     * } $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        // Recupera e formata a data.
        $date = $this->formatDate($row['data_da_transacao']);

        // Cria um novo evento.
        return new TransactionNew([
            'transaction_id'   => $row['id_da_transacao'],
            'transaction_date' => $date,
            'operation'        => $row['operacao'],
            'flag'             => $row['bandeira'],
            'payment_method'   => $row['forma_de_pagamento'],
            'gross_value'      => currency_to_db($row['valor_bruto']),
            'net_value'        => currency_to_db($row['valor_liquido']),
            'fee_value'        => currency_to_db($row['valor_taxa']),
            'status'           => $row['status'],
        ]);
    }

    // Método para converter a data no formato numérico do Excel para um formato legível.
    protected function formatDate(string|float $date): DateTime
    {
        try {
            // Checar se valor do argumento $date é um datetime serializado (numérico).
            // Se for, chamará método 'excelToDateTimeObject' para formatá-lo em data no formato BD 'Y-m-d H:i:s'.
            if (is_numeric($date)) {
                return Date::excelToDateTimeObject($date);
            }

            // Se valor do argumento $date é um datetime no formato 'd/m/Y H:i:s'.
            if (str_contains($date, '/') && str_contains($date, ':')) {

                // Inicializa as variáveis para evitar erros de "undefined".
                $new_date = null;
                $new_time = null;

                // Prepara o date.
                $date_string = explode('/', $date);

                if (count($date_string) > 1) {
                    $new_date = $this->dateToDb($date)->format('Y-m-d');
                }

                // Prepara o time.
                $date_string = explode(':', $date);

                if (count($date_string) > 1) {
                    $new_time = $this->timeToDb($date)->format('H:i:s');
                }

                return Carbon::createFromFormat('Y-m-d H:i:s', $new_date . ' ' . $new_time);
            }

            // Se valor do argumento $date é um datetime no formato 'd/m/Y'.
            // chamará o método 'dateToDb' para formatá-lo em data no formato 'Y-m-d'.
            if (str_contains($date, '/')) {

                $date_string = explode('/', $date);

                if (count($date_string) > 1) {
                    return $this->dateToDb($date);
                }
            }

            // Se valor do argumento $date é um datetime no formato 'H:i:s'.
            // chamará o método 'timeToDb' para confirmá-lo no formato 'H:i:s'.
            if (str_contains($date, ':')) {

                $date_string = explode(':', $date);

                if (count($date_string) > 1) {
                    return $this->timeToDb($date);
                }
            }

            throw new \Exception('Foi encontrado data inválida no arquivo para importação');
        } catch (\Exception $e) {
            // Registre o erro ou trate-o conforme necessário

            // TODO: poderia criar uma Exception personalizada e dar um redirect informando data errada no documento importando.
            dd($e->getMessage());
        }
    }

    public static function dateToDb(string $date): Carbon
    {
        // Quebra o $date em duas partes: data/hora.
        $date_string = explode(' ', $date);

        // Quebra $date_string (a parte da data) em três partes: dia/mês/ano.
        $date_string = explode('/', $date_string[0]);

        // Não exite parte do ano
        // Não exite parte do mês
        // retorna sem fazer nada.
        if (count($date_string) == 1) {
            // $date_string[2] = (string)Carbon::now()->year;
            throw new \Exception('Foi encontrado data inválida no arquivo para importação');
            // return $date;
            // TODO: aqui uma data inválida. Poderia criar uma Exception personalizada e dar redirect informando.
        }

        // Não existe parte do ano
        // Existe parte do mês, mas é vazio
        // retorna sem fazer nada.
        if (count($date_string) == 2 && empty($date_string[1])) {
            // return $date;
            throw new \Exception('Foi encontrado data inválida no arquivo para importação');
            // TODO: aqui uma data inválida. Poderia criar uma Exception personalizada e dar redirect informando.
        }

        // Se parte do ano existe
        if (count($date_string) == 3) {

            if (empty($date_string[2])) {

                // Quando ano vazio, o define com ano corrente
                $date_string[2] = (string)Carbon::now()->year;
            } elseif (strlen($date_string[2]) == 2) {

                // Quando ano com 2 números, o define para 4
                $date_string[2] = Carbon::createFromFormat('y', $date_string[2])->format('Y');
            }
        }

        // Não existe parte do ano
        // Existe parte do mês
        // cria parte ano com o ano corrente
        if (count($date_string) == 2) {
            $date_string[2] = (string)Carbon::now()->year;
        }

        // Retorna data remontada no formato Y-m-d.
        //dd($date_string[2], $date_string[1], $date_string[0]);
        //return Carbon::create($date_string[2], $date_string[1], $date_string[0]);
        return Carbon::createFromFormat('Y-m-d', $date_string[2] . '-' . $date_string[1] . '-' . $date_string[0]);
    }

    private function timeToDb(string $time): Carbon
    {
        // Se $time for datetime.
        if (str_contains($time, ' ')) {

            // Quebra o $time em duas partes: date // time.
            $time_string = explode(' ', $time);

            // Quebra a parte da hora do $time_string em partes: hora:minuto:segundo.
            $time_string = explode(':', $time_string[1]);

            // Se não existe parte do segundo, define-o com 00.
            if (count($time_string) == 2) {
                $time_string[2] = '00';
            }

            // Monta hora no formato 'H:i:s'.
            return Carbon::createFromFormat('H:i:s', implode(':', $time_string));
        }

        // Quebra o $time em partes: hora:minuto:segundo.
        $time_string = explode(':', $time);
        // dd(substr($time_string[0], -2), $time_string);

        // Se não existe parte do segundo, define-o com 00
        if (count($time_string) == 2) {
            $time_string[2] = '00';
        }

        // Monta a data com a hora formatada
        return Carbon::createFromFormat('H:i:s', implode(':', $time_string));
    }
}
