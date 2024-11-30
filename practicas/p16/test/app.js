$(document).ready(function(){
    let xmlSubmitted = false;

    $('#validation-result').hide();
    if(!xmlSubmitted){
        let template = '';

        template += `<tr>
                        <td colspan="3"><em>¡Aún no has ingresado ningún archivo!</em></td>
                    <tr>`;
        $('#xml-content').html(template);
    }

    $('#xml-form').submit(function(e){
        e.preventDefault();

        let xmlFile = $('#xml')[0].files[0];
        let xsdFile = $('#xsd')[0].files[0];;

        var formData = new FormData();

        formData.append('xml', xmlFile);
        formData.append('xsd', xsdFile);

        $.ajax({
            url: 'backend/serviciovod.php',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response){
                console.log(response);
                let serverResponse = JSON.parse(response);
                if(serverResponse['status'] === 'error'){
                    
                    template = '';
                    template += `
                                    <li>${serverResponse.status}</li>
                                    <li>${serverResponse.message}</li>
                                    <li>${serverResponse.errors}</li>
                                `;
                }
                else{
                    template = '';
                    template += `
                                    <li>${serverResponse.status}</li>
                                    <li>${serverResponse.message}</li>
                                `;
                }
                $('#validation-result').show();
                $('#container').html(template);
            },
            error: function(error){
                console.log(error);
            }
        });
    });

});