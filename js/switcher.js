function change_type(type){
    if(type === ""){
        document.getElementById("typeForm").innerHTML = "";
    }
    if(type === "DVD"){
        document.getElementById("typeForm").innerHTML =
                "<div class='row form-group'> <div class='col'> <label for='size'>Size (Mb)</label> </div>"+
                "<div class='col'> <input type='number' id='size' name='Size' class='form-control' maxlength='20' step='0.01' required>"+
                "</div> </div><div>Please enter size</div>";
    }
    if(type === "Book"){
        document.getElementById("typeForm").innerHTML =
            "<div class='row form-group'> <div class='col'> <label for='weight'>Weight (Kg)</label> </div>"+
            "<div class='col'> <input type='number' id='weight' name='Weight' class='form-control' maxlength='20' step='0.01' required>"+
            "</div> </div> <div>Please enter weight</div>";
    }
    if(type === "Furniture"){
        document.getElementById("typeForm").innerHTML =
            "<div class='row form-group'> <div class='col'> <label for='height'>Height (CM)</label> </div>"+
            "<div class='col'> <input type='number' id='height' name='Height' class='form-control' maxlength='20' step='0.01' required>"+
            "</div> </div>"+
            "<div class='row form-group'> <div class='col'> <label for='width'>Width (CM)</label> </div>"+
            "<div class='col'> <input type='number' id='width' name='Width' class='form-control' maxlength='20' step='0.01' required>"+
            "</div> </div>"+
            "<div class='row form-group'> <div class='col'> <label for='length'>Length (CM)</label> </div>"+
            "<div class='col'> <input type='number' id='length' name='Length' class='form-control' maxlength='20' step='0.01' required>"+
            "</div> </div> <div>Please enter size</div>";
    }
}