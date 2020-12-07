<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CardapioExemploSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = \App\Models\User::create(
            [
                'name' => 'Cardápio Público',
                'email' => 'exemplo@exemplo.com.br',
                'password' => bcrypt('6dLfvSTS'),
            ]
        );

        $estabelecimento = $user->estabelecimento()->create([
            'nome' => 'Cardápio Público',
            'url' => 'cardapio-publico-exemplo',
            'descricao' =>  'Pratos especiais com carnes variadas e tempero caseiro. Opções ao gosto do cliente e preços populares. Atendemos no almoço com as mesmas opções.',
            'codigo_ibge' => 1500107,
            'cep' => 20881885,
            'numero' => 2033,
            'bairro' => 'Everton Galhardo Neto',
            'endereco' => 'Av. Medina'
        ]);
           
        $estabelecimento->contatos()->createMany([
            [
                'tipo_contato' => 'e-mail', 
                'contato' => 'exemplo@exemplo.com.br'
            ],
            [
                'tipo_contato' => 'whatsapp',
                'contato' => '99999-9999'
            ]
        ]);

        $estabelecimento->diasAtendimento()->create([
            'dia_semana' => 'Segunda a Sexta', 
            'abre' => '09:00',
            'fecha' => '19:00'
        ]);
        
        $categoria = $estabelecimento->cardapioCategorias()->create([
            'nome' => 'Entradas',
            'ordem' => 1,
        ]);

        $categoria->itens()->create([
            'nome' => 'Salada de alfaçe e tomate.',
            'descricao' => 'Salada com ingredientes frescos',
            'preco' => 8.30,
            'ordem' => 1
        ]);

        $categoria->itens()->create([
            'nome' => 'Bolinho de bacalhau',
            'descricao' => 'Receita bem portuguesa, super saborosa e fácil de fazer',
            'preco' => 15.74,
            'ordem' => 2
        ]);

        $categoria->itens()->create([
            'nome' => 'Pão caseiro recheado',
            'descricao' => 'Pão caseiro sem sova',
            'preco' => 7,
            'ordem' => 3
        ]);

        $categoria = $estabelecimento->cardapioCategorias()->create([
            'nome' => 'Pratos principais',
            'ordem' => 2
        ]);

        $categoria->itens()->create([
            'nome' => 'Picanha',
            'descricao' => 'Acompanha arroz,salada,farofa,fritas, pão na manteiga',
            'preco' => 45,
            'ordem' => 1
        ]);

        
        $categoria->itens()->create([
            'nome' => 'Contra Filé',
            'descricao' => 'Acompanha arroz,salada,farofa,fritas',
            'preco' => 33,
            'ordem' => 2
        ]);

        $categoria->itens()->create([
            'nome' => 'Parmegiana Classico',
            'descricao' => 'Acompanha arroz,salada,farofa,fritas',
            'preco' => 28.90,
            'ordem' => 3
        ]);

        $categoria = $estabelecimento->cardapioCategorias()->create([
            'nome' => 'Sobremesas',
            'ordem' => 3
        ]);

        $categoria->itens()->create([
            'nome' => 'Bolo de Pote',
            'descricao' => 'Chocolate e morango',
            'preco' => 6.50,
            'ordem' => 1
        ]);

        $categoria->itens()->create([
            'nome' => 'Mini Churros',
            'descricao' => 'Com doce de leite açúcar e canela',
            'preco' => 6.50,
            'ordem' => 2
        ]);
    }
}
