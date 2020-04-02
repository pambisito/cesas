@extends('welcome')

@section('content')
<div id="myTabContent" class="tab-content table-bordered" style="padding-left: 8px;padding-right: 8px;">
    <div id="vision" class="tab-pane fade nav-tab-marg in active">

        <h1 class="alert alert-info" style="text-align: center;">
            <strong>CONTÁCTANOS</strong>
        </h1>
        <h4 class="text-color text-center">
            <strong><i class="fa fa-envelope-square"></i> Correo: alfalosolivos@hotmail.com</strong>
        </h4>
        <h4 class="text-color text-center">
            <strong><span class="fa fa-fax" aria-hidden="true"></span> Central telefónica: (01) 220 3298</strong>
            </h4>                  

        <div class="table-responsive">
            <table width="450" height="366" style="margin: auto;">
                <tbody>
                    <tr>
                        <td class="alert label-primary" role="alert" style="color: white; text-align: center;">DIRECTOR GENERAL</td>                        
                    </tr>
                    <tr>
                        <td class="alert alert-info" style="text-align: center;">
                            Rodolfo Reátegui<br>
                            <span class="fas fa-mobile-alt" aria-hidden="true"></span> Celular: 999999999
                        </td>
                    </tr>
                    <tr>
                        <td class="alert label-primary" role="alert" style="color: white; font-weight: bold; text-align: center;">SECRETARIA</td>                       
                    </tr>
                    <tr>
                        <td class="alert alert-info" style="text-align: center;">
                            Sheyla<br>
                            <span class="fas fa-mobile-alt" aria-hidden="true"></span> Celular: 999999999
                        </td>
                    </tr>
                    <tr></tr>
                    <tr>
                        <td class="alert label-primary" role="alert" style="color: white; font-weight: bold; text-align: center;">UNIDAD DE INFORMÁTICA</td>
                    </tr>
                    <tr>
                        <td class="alert alert-info" style="text-align: center;">
                            Carlos Eduardo Rivera Franco<br>
                            <i class="fas fa-mobile-alt"></i> Celular: 982907877
                        </td>
                    </tr> 
                    <tr></tr>
                    <tr></tr>
                    <tr></tr>
                </tbody>
            </table>
        </div>
        <p>&nbsp;</p>
    </div>
</div>
@endsection