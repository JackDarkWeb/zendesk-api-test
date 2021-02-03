<?php


namespace app\services;


class TicketCsvService
{

    public static function create($data)
    {
        $headers = array(
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=tickets.csv",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0"
        );

        $tickets = $data['tickets'];

        $filename = "tickets.csv";

        $handle = fopen($filename, 'w+');

        fputcsv($handle, array('id', 'subject', 'description', 'status', 'priority', 'group_id'));

        foreach ($tickets as $ticket){

            fputcsv($handle, array($ticket['id'], $ticket['subject'], $ticket['description'], $ticket['status'], $ticket['priority'],
                $ticket['group_id']
            ));
        }
        fclose($handle);

        return json_encode(['success' => true, 'message' => "The csv file has been created in the public folder"], true);
    }
}