<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Bootstrap Example</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        
        <link rel="stylesheet" href="datatables/css/dataTables.bootstrap.css">
        <link rel="stylesheet" href="datatables/css/dataTables.responsive.css">



        <script src="js/script.js"></script>
        
        
    </head>
    <body>
        <div class="jumbotron text-center">
            <h1>Mongo DB</h1>
        </div>
        <div id="ran">
            
        </div>
        <div class="container">
            <button class="btn btn-primary" id="AddMemberButton">Add Member</button>
            <br><br>
            
            <div class="alert" id="alertMessageContainer">
                <div id="alertMessageContent"></div>
            </div>
            
            <div class="row">
                <div class="col-sm-12" id="data-container">
                    
                </div>
            </div>
        </div>
        
        <!-- modal -->
        <div class="modal fade" id="memberFormModal" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Member Registration Form</h4>
                    </div>
                    <div class="modal-body">
                        <form  method="post" id="memberRegistrationForm">
                            <div class="form-group">
                                <label for="firstname">Firstname</label>
                                <input type="text" id="firstname" name="firstname" class="form-control"/>
                            </div>
                            <div class="form-group">
                                <label for="lastname">Lastname</label>
                                <input type="text" id="lastname" name="lastname" class="form-control"/>
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" id="address" name="address" class="form-control"/>
                            </div>
                            <div class="form-group">
                                <label for="contact">Contact</label>
                                <input type="text" id="contact" name="contact" class="form-control"/>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" id="registerButtonModal">Register</button>
                    </div>
                </div>
            </div>
        </div>
        


        
    </body>
</html>