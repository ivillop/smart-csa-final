<?php

namespace App\Http\Controllers;

use App\Models\AgendaAcara;
use Illuminate\Http\Request;

class AgendaAcaraController extends Controller
{
    public function index()
    {
        $agendaAcaras = AgendaAcara::all();
        return view('agenda-acara.index', compact('agendaAcaras'));
    }

    public function create()
    {
        return view('agenda-acara.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_acara' => 'required|string',
            'tanggal_pelaksanaan' => 'required|date',
            'waktu_mulai' => 'required|date_format:H:i',
            'waktu_selesai' => 'required|date_format:H:i',
            'lokasi' => 'required|string',
            'penyelenggara' => 'required|string',
            'prioritas' => 'required|string|in:High,Medium,Low',
            'status' => 'required|string|in:Planned,Ongoing,Completed,Cancelled',
        ]);

        AgendaAcara::create($request->all());
        return redirect()->route('agenda-acara.index')->with('success', 'Agenda acara berhasil ditambahkan');
    }

    public function edit(AgendaAcara $agendaAcara)
    {
        return view('agenda-acara.edit', compact('agendaAcara'));
    }

    public function update(Request $request, AgendaAcara $agendaAcara)
    {
        $request->validate([
            'nama_acara' => 'required|string',
            'tanggal_pelaksanaan' => 'required|date',
            'waktu_mulai' => 'required|date_format:H:i',
            'waktu_selesai' => 'required|date_format:H:i',
            'lokasi' => 'required|string',
            'penyelenggara' => 'required|string',
            'prioritas' => 'required|string|in:High,Medium,Low',
            'status' => 'required|string|in:Planned,Ongoing,Completed,Cancelled',
        ]);

        $agendaAcara->update($request->all());
        return redirect()->route('agenda-acara.index')->with('success', 'Agenda acara berhasil diupdate');
    }

    public function destroy(AgendaAcara $agendaAcara)
    {
        $agendaAcara->delete();
        return redirect()->route('agenda-acara.index')->with('success', 'Agenda acara berhasil dihapus');
    }
}
