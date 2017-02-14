/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function(){
    
    // variable identifier
    var mode = 0;
    
    var old_contact = 0;
    
    var AddMemberButton = $("#AddMemberButton");
    
    
    var memberFormModal = $("#memberFormModal");
    var memberRegistrationForm = $("#memberRegistrationForm");
    var registerButtonModal = $("#registerButtonModal");
    var dataContainer = $("#data-container");
    
    var alertMessageContainer = $("#alertMessageContainer");
    var alertMessageContent = $("#alertMessageContent");
    
    // form field
    var firstname = $("#firstname");
    var lastname = $("#lastname");
    var address = $("#address");
    var contact = $("#contact");
    
    dataContainer.load("page.php");
    
    alertMessageContainer.hide();
    
    AddMemberButton.click(function(){
        mode = 1;
        memberFormModal.modal("show");
    });
    
    $(document).on('click', '.updateMemberButton', function(){
        mode = 2;
        console.log("hello");
        var id = this.getAttribute("id_value");
        var firstname_value = document.getElementById("firstnameTd"+id).innerText;
        var lastname_value = document.getElementById("lastnameTd"+id).innerText;
        var address_value = document.getElementById("addressTd"+id).innerText;
        var contact_value = document.getElementById("contactTd"+id).innerText;
        old_contact = contact_value;
        firstname.val(firstname_value);
        lastname.val(lastname_value);
        address.val(address_value);
        contact.val(contact_value);
        memberFormModal.modal("show");
    });
    
    $(document).on('click', '.deleteMemberButton', function(){
        var id = this.getAttribute("id_value");
        var selected_contact = this.getAttribute("contact_number");
        console.log(selected_contact);
        $.ajax({
            type: "POST",
            url: "classes/Process.php",
            dataType: "json",
            data: {
                old_contact : selected_contact,
                form_mode : 3
            },
            success: function(data){
                if (data.response == true) {
                    alertMessageContent.text("Data Successfully deleted");
                    alertMessageContainer.addClass("alert-success");
                } else {
                    alertMessageContent.text("Cannot process request!");
                    alertMessageContainer.addClass("alert-danger");
                }
                alertMessageContainer.show();
                console.log(data);
            },
            error: function(error){
                console.log(error);
            }
	});
        $("#Tr"+id).hide();
    })
    
    registerButtonModal.click(function(){
        var member =  memberRegistrationForm.serialize() + '&form_mode=' + mode + '&old_contact=' +old_contact;
        console.log(old_contact);
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
                    if (mode == 1)
                        alertMessageContent.text("Data Successfully inserted");
                    else if (mode == 2)
                        alertMessageContent.text("Data Successfully updated");
                    alertMessageContainer.addClass("alert-success");
                } else {
                    alertMessageContent.text("Cannot process request!");
                    alertMessageContainer.addClass("alert-danger");
                }
                alertMessageContainer.show();
                mode = 0;
                old_contact = 0;
                console.log(data);
            },
            error: function(error){
                console.log(error);
            }
	});
    })
    
})