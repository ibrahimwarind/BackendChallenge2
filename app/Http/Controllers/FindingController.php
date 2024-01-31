<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FindingController extends Controller
{
    public function findDuplicates(Request $request)
    {
        $N = $request->input('N');
        $a = $request->input('a');

        $duplicateElements = $this->getDuplicateElements($a);

        return response()->json(['duplicates' => $duplicateElements]);
    }

    private function getDuplicateElements($arr)
    {
        $duplicateElements = [];
        $occurrenceCount = array_count_values($arr);

        foreach ($occurrenceCount as $element => $count) {
            if ($count > 1) {
                $duplicateElements[] = $element;
            }
        }

        return $duplicateElements;
    }
}
