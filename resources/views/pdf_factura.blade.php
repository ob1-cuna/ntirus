<html lang="pt">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<head>
    <title>Factura - 000{{$dados->id}}</title>
    <style>
        @font-face {
            font-family: 'Helvetica';
            font-style: normal;
            font-weight: normal;
        }

        body {
            font-family: "Helvetica", sans-serif;
        }
        .limites {
            border: 1px solid;
        }

    </style>
</head>
<body>
<div>
    <div>
    <table style="float: left; ">
        <tbody>
        <tr>
            <td>
                <b>Autor</b>
            </td>
            <td>
                Ntirus
            </td>
        </tr>
        <tr>
            <td>

            </td>
            <td>
                Beira, Sofala
            </td>
        </tr>
        <tr>
            <td>

            </td>
            <td>
                Mozambique
            </td>
        </tr>
        <tr>
            <td>
<br>
            </td>
            <td>
            </td>
        </tr>
        <tr>
            <td>
                <b>Para</b>
            </td>
            <td>
                {{ $dados->trabalho->freelancer->name }}
            </td>
        </tr>
        <tr>
            <td>

            </td>
            <td>
                {{ $dados->trabalho->freelancer->perfil->cidade }}, {{ $dados->trabalho->freelancer->perfil->provincia }}
            </td>
        </tr>
        <tr>
            <td>

            </td>
            <td>
                Mozambique
            </td>
        </tr>
        </tbody>
    </table>
    <div style="float: right">
        <table style="margin-top: 0; margin-bottom: 5px">
            <tr style="text-align: center; background-color: #f2f2f2">
                <td>
                    <h2 style="margin-top: 5px; margin-bottom: 5px;padding-left: 95px;padding-right: 85px;">Factura</h2>
                </td>
            </tr>
        </table>
    <table>
        <tr>
            <td>
                Referência
            </td>
            <td style="text-align: right">
                000{{ $dados->id }}
            </td>
        </tr>
        <tr>
            <td>
                Data Emissão
            </td>
            <td style="text-align: right">
                {{ Carbon::parse($dados->created_at)->format('d M Y') }}
            </td>
        </tr>
        <tr>
            <td>
                Data de Pagamento
            </td>
            <td style="text-align: right">
                {{ Carbon::parse($dados->data_pagamento)->format('d M Y') }}
            </td>
        </tr>
        <tr>
            <td>
                Valor Pago
            </td>
            <td style="text-align: right">
                {{ number_format($dados->valor), 2 }} MZN
            </td>
        </tr>
    </table>
    </div>
    </div>
<div style="padding-top: 200px">
<table style="width:100%; border-bottom: 1px solid; border-bottom-color: #f2f2f2">
    <tbody>
    <tr>
        <th style="text-align: center; border:0; background-color: #f2f2f2">Descricao</th>
        <th style="text-align: center; border:0; background-color: #f2f2f2">ID Trabalho</th>
        <th style="text-align: center; border:0; background-color: #f2f2f2">Preco</th>
    </tr>
    <tr>
        <td style="">{{ $dados->trabalho->nome_trabalho }}</td>
        <td style="text-align: center">{{ $dados->trabalho->slug }}</td>
        <td style="text-align: right">{{ number_format($dados->valor, 2 ) }} MZN</td>
    </tr>
    <tr>
        <td style=""></td>
        <td style="text-align: center"><br></td>
        <td style="text-align: right"></td>
    </tr>
    <tr>
        <td style=""></td>
        <td style="text-align: center"><b>Total</b></td>
        <td style="text-align: right">{{ number_format($dados->valor, 2 ) }} MZN</td>
    </tr>
    </tbody>
</table>
</div>
    <p style="text-align: right"> Processado pela: <img src="images/brand_ntitus/logotype.svg" width="65px" height="15px" alt="logotipo"></p>
</div>
<a href="{{ route('pdf-file', ['transacao' => $dados->id]) }}" class="btn btn-primary">Baixar</a>
</body>
</html>