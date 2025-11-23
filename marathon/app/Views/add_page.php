<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Bootstrap Admin Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <?php
        echo view('includes/header');
        echo view('includes/menu');

        ?>
        <!-- /.navbar-collapse -->
    </nav>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Forms
                    </h1>
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                        </li>
                        <li class="active">
                            <i class="fa fa-edit"></i> Forms
                        </li>
                    </ol>
                </div>
            </div>
            <!-- /.row -->

            <div class="row">
                <div class="col-lg-6">

                    <form role="form">

                        <div class="form-group">
                            <label>First Name</label>
                            <input class="form-control">
                            <p class="help-block">Example block-level help text here.</p>
                        </div>

                        <div class="form-group">
                            <label>Last Name</label>
                            <input class="form-control" placeholder="Enter text">
                        </div>

                        <div class="form-group">
                            <label>Static Control</label>
                            <p class="form-control-static">email@example.com</p>
                        </div>

                        <div class="form-group">
                            <label>File input</label>
                            <input type="file">
                        </div>

                        <div class="form-group">
                            <label>Text area</label>
                            <textarea class="form-control" rows="3"></textarea>
                        </div>

                        <div class="form-group">
                            <label>Ethnicity</label>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" value="">White/Caucasian
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" value="">African American
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" value="">Pacific Islander/Asian American
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" value="">Hispanic/Latino
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" value="">Indian American
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Inline Checkboxes</label>
                            <label class="checkbox-inline">
                                <input type="checkbox">1
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox">2
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox">3
                            </label>
                        </div>

                        <div class="form-group">
                            <label>Gender</label>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>Male
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">Female
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="optionsRadios" id="optionsRadios3" value="option3">Asexual
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="optionsRadios" id="optionsRadios3" value="option3">Transgender
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="optionsRadios" id="optionsRadios3" value="option3">Other
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Inline Radio Buttons</label>
                            <label class="radio-inline">
                                <input type="radio" name="optionsRadiosInline" id="optionsRadiosInline1" value="option1" checked>1
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="optionsRadiosInline" id="optionsRadiosInline2" value="option2">2
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="optionsRadiosInline" id="optionsRadiosInline3" value="option3">3
                            </label>
                        </div>

                        <div class="form-group">
                            <label>Select Country</label>
                            <select class="form-control">
                                <option>Algeria</option>
                                <option>Brazil</option>
                                <option>Canada</option>
                                <option>China</option>
                                <option>Denmark</option>
                                <option>France</option>
                                <option>Mexico</option>
                                <option>Russia</option>
                                <option>United Kingdom</option>
                                <option>United States</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Select</label>
                            <select multiple class="form-control">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                                <option>6</option>
                                <option>7</option>
                                <option>8</option>
                                <option>9</option>
                                <option>10</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-default">Submit Button</button>
                        <button type="reset" class="btn btn-default">Reset Button</button>

                    </form>

                </div>
                <div class="col-lg-6">
                    <h1>Location</h1>

                    <form role="form">

                        <fieldset disabled>

                            <div class="form-group">
                                <label for="disabledSelect">City/State</label>
                                <input class="form-control" id="disabledInput" type="text" placeholder="Disabled input" disabled>
                            </div>

                            <div class="form-group">
                                <label for="disabledSelect">Country</label>
                                <select id="disabledSelect" class="form-control">
                                    <option>Disabled select</option>
                                </select>
                            </div>

                            <div class="checkbox">
                                <label>
                                    <input type="checkbox">Disabled Checkbox
                                </label>
                            </div>

                            <button type="submit" class="btn btn-primary">Disabled Button</button>

                        </fieldset>

                    </form>

                    <h1>Organization</h1>

                    <form role="form">

                        <div class="form-group has-success">
                            <label class="control-label" for="inputSuccess">Input with success</label>
                            <input type="text" class="form-control" id="inputSuccess">
                        </div>

                        <div class="form-group has-warning">
                            <label class="control-label" for="inputWarning">Input with warning</label>
                            <input type="text" class="form-control" id="inputWarning">
                        </div>

                        <div class="form-group has-error">
                            <label class="control-label" for="inputError">Input with error</label>
                            <input type="text" class="form-control" id="inputError">
                        </div>

                    </form>

                    <h1>Create Account</h1>

                    <form role="form">

                        <div class="form-group input-group">
                            <span class="input-group-addon">@</span>
                            <input type="text" class="form-control" placeholder="Email">
                        </div>

                        <div class="form-group input-group">
                            <input type="text" class="form-control" placeholder="Username">
                            <span class="input-group-addon">.00</span>
                        </div>

                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-eur"></i></span>
                            <input type="text" class="form-control" placeholder="Password">
                        </div>

                        <div class="form-group input-group">
                            <span class="input-group-addon">$</span>
                            <input type="text" class="form-control" placeholder="Retype Password">
                            <span class="input-group-addon">.00</span>
                        </div>

                        <div class="form-group input-group">
                            <input type="text" class="form-control">
                            <span class="input-group-btn"><button class="btn btn-default" type="button"><i class="fa fa-search"></i></button></span>
                        </div>

                    </form>

                    <p>For complete documentation, please visit <a href="http://getbootstrap.com/css/#forms">Bootstrap's Form Documentation</a>.</p>

                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

</body>

</html>

