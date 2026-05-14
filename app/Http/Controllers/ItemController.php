<?php

namespace App\Http\Controllers;

class ItemController extends Controller
{
    private function queueServices(): array
    {
        return [
            [
                'id' => 1,
                'name' => 'Student Document Request',
                'category' => 'Registrar Service',
                'description' => 'Queue slot for students requesting certificates, grades, or enrollment documents.',
                'estimated_time' => '15 minutes',
                'priority' => 'Regular',
            ],
            [
                'id' => 2,
                'name' => 'Tuition Payment Assistance',
                'category' => 'Cashier Service',
                'description' => 'Queue reservation for payment concerns, balance checking, and official receipt assistance.',
                'estimated_time' => '10 minutes',
                'priority' => 'Regular',
            ],
            [
                'id' => 3,
                'name' => 'Library Clearance Check',
                'category' => 'Library Service',
                'description' => 'Queue slot for clearance signing, borrowed book verification, and library account checking.',
                'estimated_time' => '8 minutes',
                'priority' => 'Fast Lane',
            ],
            [
                'id' => 4,
                'name' => 'Guidance Consultation',
                'category' => 'Student Support',
                'description' => 'Private queue reservation for students who need academic or personal guidance support.',
                'estimated_time' => '30 minutes',
                'priority' => 'Scheduled',
            ],
            [
                'id' => 5,
                'name' => 'ID Replacement Request',
                'category' => 'Admin Office',
                'description' => 'Queue slot for lost, damaged, or updated student identification card requests.',
                'estimated_time' => '20 minutes',
                'priority' => 'Regular',
            ],
        ];
    }

    public function index()
    {
        $items = $this->queueServices();

        return view('items.index', compact('items'));
    }

    public function show($id)
    {
        $items = $this->queueServices();
        $item = collect($items)->firstWhere('id', (int) $id);

        abort_if(! $item, 404);

        return view('items.show', compact('item'));
    }
}
