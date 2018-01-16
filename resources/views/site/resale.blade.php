@extends('site.main')

@section('css')
    <style>

        #revenda header {
            margin: 80px 0 60px;
            background: url({{asset('img/bg2.jpg')}}) fixed;
        }

        @media (min-width: 1200px) {
            #revenda header h1 {
                margin: 0;
                padding: 50px;
                width: 100%;
                font-size: 28px;
                color: #d0bc86;
                letter-spacing: 16px;
                line-height: 40px;
            }
        }

        @media (max-width: 1200px) {
            #revenda header h1 {
                margin: 0;
                padding: 40px;
                width: 100%;
                font-size: 25px;
                color: #d0bc86;
                letter-spacing: 10px;
                line-height: 40px;
            }
        }

        #revenda {
            margin-top: -100px;
            padding-top: 100px;
            padding-bottom: 140px;
            background: url({{ asset('img/bg.jpg') }}) fixed;
            display: block;
            position: relative;
        }

        #revenda h1 {
            color: #ba9e17;
            text-align: center;
            margin-bottom: 50px;
            padding-top: 100px;
            font-weight: bold;
        }

        #revenda p {
            font-size: 17px;
            line-height: 26px;
            color: #444;
            text-align: center;
            margin-bottom: 30px;
            font-weight: bold;
        }

        label {
            color: #47521c;
            font-weight: normal;
            font-size: 14px;
        }

        label span {
            color: red;
        }

    </style>
@endsection

@section('main')

    <section id="revenda">

        <header>
            <h1>Seja um revendedor</h1>
        </header>

        <div class="container text-center">
            @include('flash::message')
        </div>

        <div class="container">
            <p>Tenha sempre Military Trail em sua loja e aumente suas vendas.</p>
            <form action="{{ route('salvar-revenda') }}" method="post">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="cnpj">CNPJ <span>*</span></label>
                            <input type="text" class="form-control" name="cnpj" id="cnpj" required autofocus>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="inscricao-estadual">Inscrição Estadual <span>*</span></label>
                            <input type="text" class="form-control" name="inscricao_estadual" id="inscricao-estadual"
                                   required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="razao-social">Razão Social <span>*</span></label>
                            <input type="text" class="form-control" name="razao_social" id="razao-social" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="nome-fantasia">Nome Fantasia <span>*</span></label>
                            <input type="text" class="form-control" name="nome_fantasia" id="nome-fantasia" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="tipo-loja">Qual o tipo de loja? <span>*</span></label>
                            <select class="form-control" name="tipo_loja" id="tipo-loja" required>
                                <option value="">Selecione...</option>
                                <option value="Loja de Suplementos">Loja de Suplementos</option>
                                <option value="Farmácia">Farmácia</option>
                                <option value="Loja de Naturais">Loja de Naturais</option>
                                <option value="Distribuidor">Distribuidor</option>
                                <option value="E-Commerce">E-Commerce</option>
                                <option value="Outros">Outros</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="soube">Como soube da Military Trail? <span>*</span></label>
                            <select class="form-control" name="soube" id="soube" required>
                                <option value="">Selecione...</option>
                                <option value="Anúncio na Televisão">Anúncio na Televisão</option>
                                <option value="Anúncio em Revistas">Anúncio em Revistas</option>
                                <option value="Internet">Internet</option>
                                <option value="Recomendação">Recomendação</option>
                                <option value="Patrocínio em Eventos">Patrocínio em Eventos</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="cep">CEP <span>*</span></label>
                            <input type="text" class="form-control" name="cep" id="cep" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="endereco">Endereço <span>*</span></label>
                            <input type="text" class="form-control" name="endereco" id="endereco" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="complemento">Complemento</label>
                            <input type="text" class="form-control" name="complemento" id="complemento">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="bairro">Bairro <span>*</span></label>
                            <input type="text" class="form-control" name="bairro" id="bairro" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="cidade">Cidade <span>*</span></label>
                            <input type="text" class="form-control" name="cidade" id="cidade" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="uf">UF <span>*</span></label>
                            <select class="form-control" name="uf" id="uf" required>
                                <option value="">Selecione...</option>
                                <option value="AC">Acre</option>
                                <option value="AL">Alagoas</option>
                                <option value="AP">Amapá</option>
                                <option value="AM">Amazonas</option>
                                <option value="BA">Bahia</option>
                                <option value="CE">Ceará</option>
                                <option value="DF">Distrito Federal</option>
                                <option value="ES">Espírito Santo</option>
                                <option value="GO">Goiás</option>
                                <option value="MA">Maranhão</option>
                                <option value="MT">Mato Grosso</option>
                                <option value="MS">Mato Grosso do Sul</option>
                                <option value="MG">Minas Gerais</option>
                                <option value="PA">Pará</option>
                                <option value="PB">Paraíba</option>
                                <option value="PR">Paraná</option>
                                <option value="PE">Pernambuco</option>
                                <option value="PI">Piauí</option>
                                <option value="RJ">Rio de Janeiro</option>
                                <option value="RN">Rio Grande do Norte</option>
                                <option value="RS">Rio Grande do Sul</option>
                                <option value="RO">Roraima</option>
                                <option value="SC">Santa Catarina</option>
                                <option value="SP">São Paulo</option>
                                <option value="SE">Sergipe</option>
                                <option value="TO">Tocantins</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="nome-contato">Nome do Contato <span>*</span></label>
                            <input type="text" class="form-control" name="nome_contato" id="nome-contato" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="email">E-mail <span>*</span></label>
                            <input type="email" class="form-control" name="email" id="email" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="confirma-email">Confirmar E-mail <span>*</span></label>
                            <input type="email" class="form-control" name="confirma_email" id="confirma-email" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="site">Site</label>
                            <input type="text" class="form-control" name="site" id="site">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="telefone">Telefone <span>*</span></label>
                            <input type="tel" class="form-control" name="telefone" id="telefone" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="celular">Celular <span>*</span></label>
                            <input type="tel" class="form-control" name="celular" id="celular" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <label><span>* Campos obrigatórios</span></label>
                        <br>
                        <button type="submit" class="bt">Enviar <i class="fa fa-arrow-right" aria-hidden="true"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </section>

@endsection

@section('js')
    <script>
        $(function () {
            $("#cnpj").mask("99.999.999/9999-99");
            $("#telefone").mask("(099) 9999-9999");
            $("#celular").mask("(099) 99999-9999");
            $("#cep").mask("99999-999");
        });
    </script>
@endsection
