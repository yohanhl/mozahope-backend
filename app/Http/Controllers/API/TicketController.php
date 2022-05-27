<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\TicketRequest;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function ticket(TicketRequest $request)
    {
        $data = $request->all();

        $ticket = Ticket::create($data);

        return ResponseFormatter::success($ticket, 'Ticket berhasil dikirim');
    }
}
