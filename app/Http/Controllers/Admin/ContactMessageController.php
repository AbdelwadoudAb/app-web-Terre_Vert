<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;

class ContactMessageController extends Controller
{
    public function index()
    {
        $messages = ContactMessage::query()
            ->latest()
            ->paginate(10);

        return view(
            'admin.contact-messages.index',
            compact('messages')
        );
    }


    public function show(ContactMessage $contactMessage)
    {
        if (!$contactMessage->is_read) {

            $data = [
                'is_read' => true,
            ];

            if (!$contactMessage->is_processed) {
                $data['status'] = 'lu';
            }

            $contactMessage->update($data);
        }


        return view(
            'admin.contact-messages.show',
            compact('contactMessage')
        );
    }


    public function markAsRead(
        ContactMessage $contactMessage
    ) {

        if ($contactMessage->is_processed) {

            $contactMessage->update([
                'is_read' => true,
                'status' => 'traite',
            ]);

            return redirect()
                ->route(
                    'user.contact-messages.show',
                    $contactMessage
                )
                ->with(
                    'success',
                    'Ce message est déjà traité.'
                );
        }


        $contactMessage->update([
            'is_read' => true,
            'status' => 'lu',
        ]);


        return redirect()
            ->route(
                'user.contact-messages.show',
                $contactMessage
            )
            ->with(
                'success',
                'Message marqué comme lu.'
            );
    }


    public function markAsProcessed(
        ContactMessage $contactMessage
    ) {

        if ($contactMessage->is_processed) {

            return redirect()
                ->route(
                    'user.contact-messages.show',
                    $contactMessage
                )
                ->with(
                    'success',
                    'Ce message est déjà marqué comme traité.'
                );
        }


        $contactMessage->update([
            'is_read' => true,
            'is_processed' => true,
            'status' => 'traite',
        ]);


        return redirect()
            ->route(
                'user.contact-messages.show',
                $contactMessage
            )
            ->with(
                'success',
                'Message marqué comme traité.'
            );
    }


    public function destroy(
        ContactMessage $contactMessage
    ) {

        $contactMessage->delete();


        return redirect()
            ->route(
                'user.contact-messages.index'
            )
            ->with(
                'success',
                'Message supprimé avec succès.'
            );
    }
}