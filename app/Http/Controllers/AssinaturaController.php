<?php

namespace App\Http\Controllers;
use Inertia\Inertia;
use Redirect;
use Illuminate\Http\Request;

class AssinaturaController extends Controller
{
    public function index(){
        \MercadoPago\SDK::setAccessToken('APP_USR-7136015048027149-120922-289d0e549beb40adbbeeadf528fa7ac6-685308681');
        $preferenceMes = $this->getPreference($this->assinaturaUmMes());
        $preferenceSemestral = $this->getPreference($this->assinaturaSemestral());
        $preferenceAnual = $this->getPreference($this->assinaturaAnual());

        return Inertia::render('Assinatura', [
            'assinatura' => \Auth::user()->assinatura,
            'preferenceMes' => $this->assinaturaUmMes(),
            'preferenceSemestral' => $preferenceSemestral,
            'preferenceAnual' => $preferenceAnual
        ]); 
    }

    public function getPayer(){
        $payer = new \MercadoPago\Payer();
        $payer->name = "Joao";
        $payer->surname = "Silva";
        // $payer->email = \Auth::user()->email;
        $payer->email = 'test_user_96547458@testuser.com';
        return $payer;
    }

    public function getPreference($item){
        $preference = new \MercadoPago\Preference();
        $preference->back_urls = array(
            "success" => "localhost:8000/success-payment-return",
            "failure" => "localhost:8000/failure-payment-return",
            "pending" => "localhost:8000/pending-payment-return"
        );
        $preference->auto_return = "approved";
        $preference->external_reference = \Auth::user()->id;
        $preference->items = array($item);
        $preference->payer = $this->getPayer();
        $preference->save();
        return $preference->id;
    }

    public function assinaturaUmMes(){

        $item = new \MercadoPago\Item();
        $item->title = '1 Mês Acesso Cardápio Público';
        $item->quantity = 1;
        $item->unit_price = 49.00;
        return $item;
    }

    public function assinaturaSemestral(){
        $item = new \MercadoPago\Item();
        $item->title = '6 Mêsese Acesso Cardápio Público';
        $item->quantity = 1;
        $item->unit_price = 234.00;
        return $item;
    }

    public function assinaturaAnual(){
        // Cria um item na preferência
        $item = new \MercadoPago\Item();
        $item->title = '6 Mêses Acesso Cardápio Público';
        $item->quantity = 1;
        $item->unit_price = 348.00;
        return $item;
    }
}
