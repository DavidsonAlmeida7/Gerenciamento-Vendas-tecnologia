<?php

namespace GerenciamentoVendas\Observers;

use GerenciamentoVendas\Models\Vendedor;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class VendedorObserver
{
    use UploadObserverTrait;

    protected $foto = 'foto';
    protected $path = 'img_vendedor/';

    protected $documento_pessoal = 'documento_pessoal';
    protected $path_doc = 'documento_pessoal/';

    /**
     * Manipule o evento "criado" do vendedor.
     * Evento executado após o vendedor ser criada.
     *
     * @param  \GerenciamentoVendas\Vendedor  $vendedor
     * @return void
     */
    public function creating(Vendedor $vendedor)
    {
        $this->sendFile($vendedor);
    }

    /**
     * Manipule o evento "atualizado" do vendedor.
     * Evento executado após o vendedor ser atualizado.
     *
     * @param  \GerenciamentoVendas\Vendedor  $vendedor
     * @return void
     */
    public function updating(Vendedor $vendedor)
    {
        $this->updateFile($vendedor);
    }

    /**
     * Manipule o evento "deletado" do vendedor.
     * Evento executado após o vendedor ser deletado.
     * 
     * @param  \GerenciamentoVendas\Vendedor  $vendedor
     * @return void
     */
    public function deleting(Vendedor $vendedor)
    {
        $this->removeFile($vendedor);
    }

}
