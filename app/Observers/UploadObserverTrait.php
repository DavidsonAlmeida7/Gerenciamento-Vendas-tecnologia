<?php

namespace GerenciamentoVendas\Observers;

use GerenciamentoVendas\Models\Vendedor;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

trait UploadObserverTrait
{
    /**
     * Manipule o evento "criando" do vendedor.
     * Evento executado no momento do vendedor ser criado.
     *
     * @param  \GerenciamentoVendas\Vendedor  $vendedor
     * @return void
     */
    public function sendFile(Vendedor $vendedor)
    {
        $foto = $this->foto;
        $documento_pessoal = $this->documento_pessoal;

        if (is_a($vendedor->$foto, UploadedFile::class) and $vendedor->$foto->isValid()) {
            $this->uploadFoto($vendedor);
        }

        if (is_a($vendedor->$documento_pessoal, UploadedFile::class) and $vendedor->$documento_pessoal->isValid()) {
            $this->uploadDocumento($vendedor);
        }
    }

    /**
     * Manipule o evento "atualizando" do vendedor.
     * Evento executado após o vendedor ser atualizado.
     *
     * @param  \GerenciamentoVendas\Vendedor  $vendedor
     * @return void
     */
    protected function updateFile(Vendedor $vendedor)
    {
        $foto = $this->foto;
        $documento_pessoal = $this->documento_pessoal;

        if (is_a($vendedor->$foto, UploadedFile::class) and $vendedor->$foto->isValid()) {
            $previous_image = $vendedor->getOriginal($foto);
            Storage::delete($this->path . $previous_image);
            $this->uploadFoto($vendedor);
        }

        if (is_a($vendedor->$documento_pessoal, UploadedFile::class) and $vendedor->$documento_pessoal->isValid()) {
            $previous_image_doc = $vendedor->getOriginal($documento_pessoal);
            Storage::delete($this->path_doc . $previous_image_doc);
            $this->uploadDocumento($vendedor);
        }
    }

    /**
     * Manipule o evento "deletado" do vendedor.
     * Evento executado após o vendedor ser deletado.
     * 
     * @param  \GerenciamentoVendas\Vendedor  $vendedor
     * @return void
     */
    protected function removeFile(Vendedor $vendedor)
    {
        $foto = $this->foto;
        $documento_pessoal = $this->documento_pessoal;
        Storage::disk('local')->delete($this->path . $vendedor->$foto);
        Storage::disk('local')->delete($this->path_doc . $vendedor->$documento_pessoal);
    }

    /**
     * Manipula o arquivo Foto o salvando com nome e extensão.
     */
    protected function uploadFoto($vendedor)
    {
        $foto = $this->foto;
        $name = $vendedor->$foto->getClientOriginalName();
        $vendedor->$foto->storeAs($this->path, $name);
        $vendedor->$foto = $name;
    }

    /**
     * Manipula o arquivo Documento pessoal o salvando com nome e extensão.
     */
    protected function uploadDocumento($vendedor)
    {
        $documento_pessoal = $this->documento_pessoal;
        $name_doc = $vendedor->$documento_pessoal->getClientOriginalName();
        $vendedor->$documento_pessoal->storeAs($this->path_doc, $name_doc);
        $vendedor->$documento_pessoal = $name_doc;
    }
}