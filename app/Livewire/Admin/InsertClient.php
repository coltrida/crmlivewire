<?php

namespace App\Livewire\Admin;

use App\Models\Client;
use App\Services\CanaliService;
use App\Services\CodeClientService;
use Livewire\Attributes\Validate;
use Livewire\Component;

class InsertClient extends Component
{
    public int $shop_id;
    public int $idShop;

    #[Validate('required')]
    public string $name = '';

    #[Validate('required')]
    public string $surname = '';

    public string $address = '';

    public string $city = '';

    public string $postcode = '';

    public string $province = '';

    #[Validate('required')]
    public string $phone1 = '';

    public string $phone2 = '';

    public string $email = '';

    #[Validate('required')]
    public int $codeclient_id = 0;

    #[Validate('required')]
    public int $canal_id;

    public string $fullname;

    public string $fullnamereverse;

    public function mount($idShop)
    {
        $this->shop_id = $idShop;
        $this->idShop = $idShop;
    }

    public function insertClient()
    {
        $this->validate();

        $this->fullname = $this->name.' '.$this->surname;
        $this->fullnamereverse = $this->surname.' '.$this->name;

        Client::create(
            $this->only(
                [
                    'name',
                    'surname',
                    'address',
                    'city',
                    'postcode',
                    'province',
                    'phone1',
                    'phone2',
                    'email',
                    'codeclient_id',
                    'shop_id',
                    'canal_id',
                    'fullname',
                    'fullnamereverse'
                ])
        );

        session()->flash('status', 'Paziente inserito correttamente');

        $this->reset([
            'name',
            'surname',
            'address',
            'city',
            'postcode',
            'province',
            'phone1',
            'phone2',
            'email',
            'codeclient_id',
            'canal_id',
            'fullname',
            'fullnamereverse'
        ]);
        $this->redirect(route('admin.clienti', $this->idShop));
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Il nome è obbligatorio',
            'surname.required' => 'Il cognome è obbligatorio',
            'phone1.required' => 'Il telefono è obbligatorio',
            'codeclient_id.required' => 'Il codice paziente è obbligatorio',
            'canal_id.required' => 'Il canale Mkt è obbligatorio',
        ];
    }

    public function render(CodeClientService $codeClientService, CanaliService $canaliService)
    {
        return view('livewire.admin.insert-client', [
            'codeClient' => $codeClientService->list(),
            'canaliMKT' => $canaliService->lista()
        ])->layout('layouts.app');
    }
}
