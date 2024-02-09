<?php

namespace App\DataTables;

use App\Models\student;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Html\Editor\Editor;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;

class studentDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function ($row) {
                return '<div class="d-flex"><a href="' . route('students.edit', $row->id) . '" class="btn btn-warning me-2"><i class="bi bi-pencil-fill"></i></a>
                    <form action="' . route('students.destroy', $row->id) . '" method="POST" class="d-inline">
                        ' . csrf_field() . '
                        ' . method_field('DELETE') . '
                        <button type="submit" class="btn btn-danger" onclick="return confirm(\'Are you sure you want to delete this student data?\')"><i class="bi bi-trash3-fill"></i></button>
                    </form></div>';
            })
            ->addColumn('select', function ($row) {
                return '<div class="form-check">
                <input class="form-check-input border-dark" type="checkbox" value="' . $row->id . '" id="flexCheckDefault">
            </div>';
            })
            ->filterColumn('teacher_name', function ($query, $keyword) {
                $query->where('teachers.name', 'like', '%' . $keyword . '%');
            })
            ->rawColumns(['action', 'select'])
            ->setRowId(function ($row) {
                return $row->id;
            });
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(student $model): QueryBuilder
    {
        return $model->join('teachers', 'students.teacher_id', 'teachers.id')
            ->select('students.name as name', 'teachers.name as teacher_name', 'students.class as class', 'students.subject as subject', 'students.marks as marks', 'students.id')
            ->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('student-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            //->dom('Bfrtip')
            ->responsive(true)
            ->orderBy(1)
            // ->selectStyleSingle()
            ->buttons([
                // Button::make('excel'),
                // Button::make('csv'),
                // Button::make('pdf'),
                // Button::make('print'),
                // Button::make('reset'),
                // Button::make('reload')
            ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('select'),
            Column::make('name'),
            Column::make('class'),
            // Column::make('subject'),
            // Column::make('teacher_name'),
            // Column::make('marks'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center'),
            // Column::make('add your columns'),
            // Column::make('created_at'),
            // Column::make('updated_at'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'student_' . date('YmdHis');
    }
}
