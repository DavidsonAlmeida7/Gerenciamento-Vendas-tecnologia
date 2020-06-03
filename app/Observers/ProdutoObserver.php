<?php

namespace GerenciamentoVendas\Observers;

use GerenciamentoVendas\Models\Produto;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class ProdutoObserver
{
    protected $foto = 'foto';
    protected $path = 'img_produto/';

    /**
     * Handle the produto "creating" event.
     *
     * @param  \GerenciamentoVendas\Produto  $produto
     * @return void
     */
    public function creating(Produto $produto)
    {
        $foto = $this->foto;

        if (is_a($produto->$foto, UploadedFile::class) and $produto->$foto->isValid()) {
            $this->uploadFoto($produto);
        }
    }

    /**
     * Handle the produto "updating" event.
     *
     * @param  \GerenciamentoVendas\Produto  $produto
     * @return void
     */
    public function updating(Produto $produto)
    {
        $foto = $this->foto;

        if (is_a($produto->$foto, UploadedFile::class) and $produto->$foto->isValid()) {
            $previous_image = $produto->getOriginal($foto);
            Storage::delete($this->path . $previous_image);
            $this->uploadFoto($produto);
        }
    }

    /**
     * Handle the produto "deleting" event.
     *
     * @param  \GerenciamentoVendas\Produto  $produto
     * @return void
     */
    public function deleting(Produto $produto)
    {
        $foto = $this->foto;
        Storage::disk('local')->delete($this->path . $produto->$foto);
    }

    /**
     * Manipula o arquivo Foto o salvando com nome e extensão.
     */
    protected function uploadFoto($produto)
    {
        $foto = $this->foto;
        $name = $produto->$foto->getClientOriginalName();
        $produto->$foto->storeAs($this->path, $name);
        $produto->$foto = $name;
    }
}
