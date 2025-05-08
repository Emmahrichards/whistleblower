<?php

namespace App\Exports;

use App\Models\Comment;
use App\Exports\CommentsExport;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CommentsExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Comment::select('id', 'category', 'comment', 'created_at')->get();
    }
    public function exportComments()
{
    return Excel::download(new CommentsExport, 'comments.xlsx');
}

    public function headings(): array
    {
        return [
            'ID',
            'Category',
            'Comment',
            'Created At',
        ];
    }
}
