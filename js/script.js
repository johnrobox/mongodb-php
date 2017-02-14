/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function(){
    
    var AddMemberButton = $("#AddMemberButton");
    
    
    var memberFormModal = $("#memberFormModal");
    var memberRegistrationForm = $("#memberRegistrationForm");
    var registerButtonModal = $("#registerButtonModal");
    var dataContainer = $("#data-container");
    
    var alertMessageContainer = $("#alertMessageContainer");
    var alertMessageContent = $("#alertMessageContent");
    
    dataContainer.load("page.php");
    
    alertMessageContainer.hide();
    
    AddMemberButton.click(function(){
        memberFormModal.modal("show");
    });
    
    $(document).on('click', '.updateMemberButton', function(){
        console.log("hello");
        var id = this.getAttribute("id_value");
        var firstname_value = $("#firstnameTd"+id).innerText;
        console.log(firstname_value);
        memberFormModal.modal("show");
    });
    
    $(document).on('click', '.deleteMemberButton', function(){
        var id = this.getAttribute("id_value");
        $("#Tr"+id).hide();
    })
    
    registerButtonModal.click(function(){
        var member =  memberRegistrationForm.serialize() + '&form_mode=1';
        $.ajax({
            type: "POST",
            url: "classes/Process.php",
            dataType: "json",
            data: member,
            success: function(data){
                dataContainer.load("page.php");
                memberFormModal.modal("hide");
                document.getElementById("memberRegistrationForm").reset();
                if (data.response.inserted == true) {
                    alertMessageContent.text("Data Successfully inserted");
                    alertMessageContainer.addClass("alert-success");
                } else {
                    alertMessageContent.text("Data Successfully inserted");
                    alertMessageContainer.addClass("alert-danger");
                }
                alertMessageContainer.show();
            },
            error: function(error){
                console.log(error);
            }
	});
    })
    
})