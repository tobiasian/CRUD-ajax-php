$(function() {
    console.log('jquery works');
    
    $('#search').keyup(function(){
        let search = $('#search').val();
        //console.log(search);
        $.ajax({
            type: "POST",
            url: "task-search.php",
            data: {
                search : search},
            success: function (response) {
                //console.log(response)     
                let tarea = JSON.parse(response); //Guardar json en data[]
                console.log(tarea);
                let template = '';
                tarea.forEach(tarea => {
                    //console.log(tarea);
                    template += `<li>
                         ${tarea.name}
                    </li>`
                });

            }
        });        

    })
    
});