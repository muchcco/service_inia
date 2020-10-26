@extends('layout.layout')

@section('content')
<div id="page-head">
                    
    <div class="pad-all text-center">
        <h3>MÓDULO DE ALMACENAMIENTO DE ARCHIVOS PERSONALES</h3>
        <p1>Reporte de Productores agrarios<p>
    </p1></div>
        </div>

    
    <!--Page content-->
    <!--===================================================-->

<div id="page-content">
                    
    

    <div class="row">
        <div class="col-md-3">
            <div class="panel panel-warning panel-colorful media middle pad-all">
                <div class="media-left">
                    <div class="pad-hor">
                        <i class="fa fa-database" style="font-size: 2.2em;"></i>
                    </div>
                </div>
                <div class="media-body">
                    <p class="text-2x mar-no text-semibold">241</p>
                    <p class="mar-no">Documentos</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="panel panel-info panel-colorful media middle pad-all">
                <div class="media-left">
                    <div class="pad-hor">
                        <i class="fa fa-folder text-fuchsia" style="font-size: 2.2em;"></i>
                    </div>
                </div>
                <div class="media-body">
                    <p class="text-2x mar-no text-semibold">241</p>
                    <p class="mar-no">Carpetas</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="panel panel-mint panel-colorful media middle pad-all">
                <div class="media-left">
                    <div class="pad-hor">
                        <i class="fa fa-exclamation-triangle"></i>
                    </div>
                </div>
                <div class="media-body">
                    <p class="text-2x mar-no text-semibold">241</p>
                    <p class="mar-no"></p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="panel panel-danger panel-colorful media middle pad-all">
                <div class="media-left">
                    <div class="pad-hor">
                        <i class="demo-pli-video icon-3x"></i>
                    </div>
                </div>
                <div class="media-body">
                    <p class="text-2x mar-no text-semibold">241</p>
                    <p class="mar-no">Videos</p>
                </div>
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-sm-6 col-lg-4">
            <!--List Todo-->
            <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
            <div class="panel panel-trans">
                <div class="panel-heading">
                    <h3 class="panel-title">To do list</h3>
                </div>
                <div class="pad-ver">
                    <ul class="list-group bg-trans list-todo mar-no">
                        <li class="list-group-item">
                            <input id="demo-todolist-1" class="magic-checkbox" type="checkbox">
                            <label for="demo-todolist-1"><span>Find an idea. <span class="label label-danger">Important</span></span></label>
                        </li>
                        <li class="list-group-item">
                            <input id="demo-todolist-2" class="magic-checkbox" type="checkbox" checked="">
                            <label for="demo-todolist-2"><span>Do some work</span></label>
                        </li>
                        <li class="list-group-item">
                            <input id="demo-todolist-3" class="magic-checkbox" type="checkbox">
                            <label for="demo-todolist-3"><span>Read the book</span></label>
                        </li>
                        <li class="list-group-item">
                            <input id="demo-todolist-4" class="magic-checkbox" type="checkbox">
                            <label for="demo-todolist-4"><span>Upgrade server <span class="label label-warning">Warning</span></span></label>
                        </li>
                        <li class="list-group-item">
                            <input id="demo-todolist-5" class="magic-checkbox" type="checkbox" checked="">
                            <label for="demo-todolist-5"><span>Redesign my logo <span class="label label-info">2 Mins</span></span></label>
                        </li>
                    </ul>
                </div>
                <div class="input-group pad-all">
                    <input type="text" class="form-control" placeholder="New task" autocomplete="off">
                    <span class="input-group-btn">
                    <button type="button" class="btn btn-success"><i class="demo-pli-add"></i></button>
                </span>
                </div>
            </div>
            <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
            <!--End todo list-->
        </div>
        <div class="col-sm-6 col-lg-4">
            <div class="panel panel-trans">
                <div class="panel-heading">
                    <div class="panel-control">
                        <a title="" data-html="true" data-container="body" data-original-title="&lt;p class='h4 text-semibold'&gt;Information&lt;/p&gt;&lt;p style='width:150px'&gt;This is an information bubble to help the user.&lt;/p&gt;" href="#" class="demo-psi-information icon-lg icon-fw unselectable text-info add-tooltip"></a>
                    </div>
                    <h3 class="panel-title">Services</h3>
                </div>
                <div class="bord-btm">
                    <ul class="list-group bg-trans">
                        <li class="list-group-item">
                            <div class="pull-right">
                                <input id="demo-online-status-checkbox" class="toggle-switch" type="checkbox" checked="">
                                <label for="demo-online-status-checkbox"></label>
                            </div>
                            Online status
                        </li>
                        <li class="list-group-item">
                            <div class="pull-right">
                                <input id="demo-show-off-contact-checkbox" class="toggle-switch" type="checkbox" checked="">
                                <label for="demo-show-off-contact-checkbox"></label>
                            </div>
                            Show offline contact
                        </li>
                        <li class="list-group-item">
                            <div class="pull-right">
                                <input id="demo-show-device-checkbox" class="toggle-switch" type="checkbox">
                                <label for="demo-show-device-checkbox"></label>
                            </div>
                            Show my device icon
                        </li>
                    </ul>
                </div>
                <div class="panel-body">
                    <div class="pad-btm">
                        <p class="text-semibold text-main">Upgrade Progress</p>
                        <div class="progress progress-md">
                            <div class="progress-bar progress-bar-purple" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100" style="width: 15%;" role="progressbar">
                                <span class="sr-only">15%</span>
                            </div>
                        </div>
                        <small>15% Completed</small>
                    </div>
                    <div>
                        <p class="text-semibold text-main">Database</p>
                        <div class="progress progress-md">
                            <div class="progress-bar progress-bar-success" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%;" role="progressbar">
                                <span class="sr-only">70%</span>
                            </div>
                        </div>
                        <small>70% Completed</small>
                    </div>
                </div>
            </div>
        </div>
        <div class='col-sm-12 col-lg-4'>
            <div class="panel panel-trans">
                <div class="pad-all">
                    <div class="media mar-btm">
                        <div class="media-left">
                            <img src="img\profile-photos\2.png" class="img-md img-circle" alt="Avatar">
                        </div>
                        <div class="media-body">
                            <p class="text-lg text-main text-semibold mar-no">Ralph West</p>
                            <p>Project manager</p>
                        </div>
                    </div>
                    <blockquote class="bq-sm bq-open bq-close">Lorem ipsum dolor sit amet, consecte tuer adipiscing elit, sed diam nonummy nibh euismod tincidunt.</blockquote>
                </div>

                <div class="bord-top">
                    <ul class="list-group bg-trans bord-no">
                        <li class="list-group-item list-item-sm">
                            <div class="media-left">
                                <i class="demo-psi-facebook icon-lg"></i>
                            </div>
                            <div class="media-body">
                                <a href="#" class="btn-link text-semibold">Facebook</a>
                            </div>
                        </li>
                        <li class="list-group-item list-item-sm">
                            <div class="media-left">
                                <i class="demo-psi-twitter icon-lg"></i>
                            </div>
                            <div class="media-body">
                                <a href="#" class="btn-link text-semibold">@RalphWe</a>
                                <br> Design my themes with <a href="#" class="btn-link text-bold">#Bootstrap</a> Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
                            </div>
                        </li>
                        <li class="list-group-item list-item-sm">
                            <div class="media-left">
                                <i class="demo-psi-instagram icon-lg"></i>
                            </div>
                            <div class="media-body">
                                <a href="#" class="btn-link text-semibold">Ralphz</a>
                            </div>
                        </li>
                        <li class="list-group-item list-item-sm">
                            <div class="media-body">

                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">Order Status</h3>
                </div>

                <!--Data Table-->
                <!--===================================================-->
                <div class="panel-body">
                    <div class="pad-btm form-inline">
                        <div class="row">
                            <div class="col-sm-6 table-toolbar-left">
                                <button class="btn btn-purple"><i class="demo-pli-add icon-fw"></i>Add</button>
                                <button class="btn btn-default"><i class="demo-pli-printer icon-lg"></i></button>
                                <div class="btn-group">
                                    <button class="btn btn-default"><i class="demo-pli-information icon-lg"></i></button>
                                    <button class="btn btn-default"><i class="demo-pli-trash icon-lg"></i></button>
                                </div>
                            </div>
                            <div class="col-sm-6 table-toolbar-right">
                                <div class="form-group">
                                    <input type="text" autocomplete="off" class="form-control" placeholder="Search" id="demo-input-search2">
                                </div>
                                <div class="btn-group">
                                    <button class="btn btn-default"><i class="demo-pli-download-from-cloud icon-lg"></i></button>
                                    <div class="btn-group dropdown">
                                        <button class="btn btn-default btn-active-primary dropdown-toggle" data-toggle="dropdown">
                                        <i class="demo-pli-dot-vertical icon-lg"></i>
                                    </button>
                                        <ul class="dropdown-menu dropdown-menu-right" role="menu">
                                            <li><a href="#">Action</a></li>
                                            <li><a href="#">Another action</a></li>
                                            <li><a href="#">Something else here</a></li>
                                            <li class="divider"></li>
                                            <li><a href="#">Separated link</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Invoice</th>
                                    <th>User</th>
                                    <th>Order date</th>
                                    <th>Amount</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Tracking Number</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><a href="#" class="btn-link"> Order #53431</a></td>
                                    <td>Steve N. Horton</td>
                                    <td><span class="text-muted">Oct 22, 2014</span></td>
                                    <td>$45.00</td>
                                    <td class="text-center">
                                        <div class="label label-table label-success">Paid</div>
                                    </td>
                                    <td class="text-center">-</td>
                                </tr>
                                <tr>
                                    <td><a href="#" class="btn-link"> Order #53432</a></td>
                                    <td>Charles S Boyle</td>
                                    <td><span class="text-muted">Oct 24, 2014</span></td>
                                    <td>$245.30</td>
                                    <td class="text-center">
                                        <div class="label label-table label-info">Shipped</div>
                                    </td>
                                    <td class="text-center">CGX0089734531</td>
                                </tr>
                                <tr>
                                    <td><a href="#" class="btn-link"> Order #53433</a></td>
                                    <td>Lucy Doe</td>
                                    <td><span class="text-muted">Oct 24, 2014</span></td>
                                    <td>$38.00</td>
                                    <td class="text-center">
                                        <div class="label label-table label-info">Shipped</div>
                                    </td>
                                    <td class="text-center">CGX0089934571</td>
                                </tr>
                                <tr>
                                    <td><a href="#" class="btn-link"> Order #53434</a></td>
                                    <td>Teresa L. Doe</td>
                                    <td><span class="text-muted">Oct 15, 2014</span></td>
                                    <td>$77.99</td>
                                    <td class="text-center">
                                        <div class="label label-table label-info">Shipped</div>
                                    </td>
                                    <td class="text-center">CGX0089734574</td>
                                </tr>
                                <tr>
                                    <td><a href="#" class="btn-link"> Order #53435</a></td>
                                    <td>Teresa L. Doe</td>
                                    <td><span class="text-muted">Oct 12, 2014</span></td>
                                    <td>$18.00</td>
                                    <td class="text-center">
                                        <div class="label label-table label-success">Paid</div>
                                    </td>
                                    <td class="text-center">-</td>
                                </tr>
                                <tr>
                                    <td><a href="#" class="btn-link">Order #53437</a></td>
                                    <td>Charles S Boyle</td>
                                    <td><span class="text-muted">Oct 17, 2014</span></td>
                                    <td>$658.00</td>
                                    <td class="text-center">
                                        <div class="label label-table label-danger">Refunded</div>
                                    </td>
                                    <td class="text-center">-</td>
                                </tr>
                                <tr>
                                    <td><a href="#" class="btn-link">Order #536584</a></td>
                                    <td>Scott S. Calabrese</td>
                                    <td><span class="text-muted">Oct 19, 2014</span></td>
                                    <td>$45.58</td>
                                    <td class="text-center">
                                        <div class="label label-table label-warning">Unpaid</div>
                                    </td>
                                    <td class="text-center">-</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <hr class="new-section-xs">
                    <div class="pull-right">
                        <ul class="pagination text-nowrap mar-no">
                            <li class="page-pre disabled">
                                <a href="#">&lt;</a>
                            </li>
                            <li class="page-number active">
                                <span>1</span>
                            </li>
                            <li class="page-number">
                                <a href="#">2</a>
                            </li>
                            <li class="page-number">
                                <a href="#">3</a>
                            </li>
                            <li>
                                <span>...</span>
                            </li>
                            <li class="page-number">
                                <a href="#">9</a>
                            </li>
                            <li class="page-next">
                                <a href="#">&gt;</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!--===================================================-->
                <!--End Data Table-->

            </div>
        </div>
    </div>


    
</div>
<!--===================================================-->
                <!--End page content-->

@endsection