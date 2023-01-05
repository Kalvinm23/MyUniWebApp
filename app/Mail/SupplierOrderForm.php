<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Supplier;
use App\SupplierOrder;
use App\SupplierOrderDetails;
use App\Product;

class SupplierOrderForm extends Mailable
{
    use Queueable, SerializesModels;

    public $emailsupplier;
    public $emailproducts;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($id)
    {
        $this->emailorder = SupplierOrder::find($id);
        $this->emailsupplier = Supplier::find($this->emailorder->supplier_id);
        $this->emailproducts = SupplierOrder::find($id)->products;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.contact.supplierordercontactform');
    }
}
