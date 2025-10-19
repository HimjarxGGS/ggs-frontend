<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\DokumentasiEvent;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $photosRowDummy = [
            ['src' => 'dokum/ggberaksi1.JPG', 'label' => 'GG-Beraksi', 'event_id' => -1],
            ['src' => 'dokum/ggberaksi2.JPG', 'label' => 'GG-Beraksi', 'event_id' => -1],
            ['src' => 'dokum/ggberaksi3.JPG', 'label' => 'GG-Beraksi', 'event_id' => -1],
            ['src' => 'dokum/ggberaksi4.JPG', 'label' => 'GG-Beraksi', 'event_id' => -1],
            ['src' => 'dokum/greenovation_batch1_1.JPG', 'label' => 'Greenovation', 'event_id' => -1],
            ['src' => 'dokum/greenovation_batch1_2.JPG', 'label' => 'Greenovation', 'event_id' => -1],
            ['src' => 'dokum/growave1.JPG', 'label' => 'Growave', 'event_id' => -1],
            ['src' => 'dokum/trashformerpart1-1.JPG', 'label' => 'Trashformer Part 1', 'event_id' => -1],
            ['src' => 'dokum/trashformerpart1-2.JPG', 'label' => 'Trashformer Part 1', 'event_id' => -1],
            ['src' => 'dokum/trashformerpart1-3.JPG', 'label' => 'Trashformer Part 1', 'event_id' => -1],
            ['src' => 'dokum/trashformerpart2-1.JPG', 'label' => 'Trashformer Part 2', 'event_id' => -1],
            ['src' => 'dokum/trashformerpart2-2.JPG', 'label' => 'Trashformer Part 2', 'event_id' => -1],
            ['src' => 'dokum/trashformerpart2-3.JPG', 'label' => 'Trashformer Part 2', 'event_id' => -1],
        ];

        //get letest event documentation
        $photosdoc = DokumentasiEvent::with('event')->latest('id')->limit(20)->get()->map(function ($item) {
            return [
                'src' => 'storage/' . $item->image, // adjust depending on your file path
                'label' => $item->event->name ?? '',
                'event_id' => $item->event_id ?? -1,
            ];
        })
            ->toArray();

        $maxItem = 25;
        // Combine and fill with placeholders if needed
        $photosRow = array_merge($photosdoc, $photosRowDummy);

        // Ensure exactly $maxItem items
        if (count($photosRow) > $maxItem) {
            $photosRow = array_slice($photosRow, 0, $maxItem);
        } else {
            while (count($photosRow) < $maxItem) {
                // Recycle placeholders if we run out
                $photosRow[] = $photosRowDummy[array_rand($photosRowDummy)];
            }
        }

        return view('guest.aboutus.index', compact('photosRow'));
    }
}
