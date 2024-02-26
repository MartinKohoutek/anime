<?php

namespace App\DataTables;

use App\Models\BlogPost;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class BlogPostDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function ($query) {
                $btnEdit = "<a href='" . route('admin.blog.post.edit', $query->id) . "' class='btn btn-primary mx-2'><i class='fas fa-edit'></i></a>";
                $btnDelete = "<a href='" . route('admin.blog.post.destroy', $query->id) . "' class='btn btn-danger delete-item'><i class='fas fa-trash'></i></a>";
                return $btnEdit . $btnDelete;
            })
            ->addColumn('status', function ($query) {
                $status = $query->status == 'active' ? 'checked' : '';
                $btn = '<div class="form-group">
                <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                <input type="checkbox" class="custom-control-input change-status" data-id="' . $query->id . '" id="status' . $query->id . '" ' . $status . '>
                <label class="custom-control-label" for="status' . $query->id . '"></label>
                </div>
            </div>';
                return $btn;
            })
            ->addColumn('image', function ($query) {
                return "<img src='" . asset($query->image) . "' style='height:40px' />";
            })
            ->addColumn('category', function ($query) {
                return $query->category->name;
            })
            ->rawColumns(['image', 'action', 'status', 'category'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(BlogPost $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('blogpost-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            //->dom('Bfrtip')
            ->orderBy(1)
            ->selectStyleSingle()
            ->buttons([
                Button::make('excel'),
                Button::make('csv'),
                Button::make('pdf'),
                Button::make('print'),
                Button::make('reset'),
                Button::make('reload')
            ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('id')->width(60),
            Column::make('image')->width(140),
            Column::make('title'),
            Column::make('category'),
            Column::make('status')->width(80),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(140)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'BlogPost_' . date('YmdHis');
    }
}
