<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ContactController extends Controller
{
    public function dataKontak(Request $request)
    {
        if ($request->ajax()) {
            $contacts = Contact::orderBy('created_at', 'desc');

            return DataTables::of($contacts)
                ->addColumn('action', function ($contact) {
                    $btn = '<div class="btn-group" role="group">';
                    $btn .= '<button type="button" class="btn btn-primary btn-sm viewMessage" data-id="' . $contact->id . '" title="Lihat Pesan">';
                    $btn .= '<i class="ti-eye"></i>';
                    $btn .= '</button>';

                    if (!$contact->is_read) {
                        $btn .= '<button type="button" class="btn btn-success btn-sm markRead" data-id="' . $contact->id . '" title="Tandai Dibaca">';
                        $btn .= '<i class="ti-check"></i>';
                        $btn .= '</button>';
                    }

                    $btn .= '<button type="button" class="btn btn-danger btn-sm deleteContact" data-id="' . $contact->id . '" title="Hapus">';
                    $btn .= '<i class="ti-trash"></i>';
                    $btn .= '</button>';
                    $btn .= '</div>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        $title = 'Pesan Kontak';
        return view('admin.data-kontak.index', compact('title'));
    }

    public function show($id)
    {
        $contact = Contact::findOrFail($id);

        // Mark as read when viewed
        if (!$contact->is_read) {
            $contact->update(['is_read' => true]);
        }

        return response()->json($contact);
    }

    public function markAsRead($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->update(['is_read' => true]);

        return response()->json([
            'success' => true,
            'message' => 'Pesan berhasil ditandai sebagai sudah dibaca'
        ]);
    }

    public function destroy($id)
    {
        try {
            $contact = Contact::findOrFail($id);
            $contact->delete();

            return response()->json([
                'success' => true,
                'message' => 'Pesan berhasil dihapus'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat menghapus pesan'
            ], 500);
        }
    }

    // Method untuk dashboard - jumlah pesan belum dibaca
    public function getUnreadCount()
    {
        return Contact::where('is_read', false)->count();
    }
}
