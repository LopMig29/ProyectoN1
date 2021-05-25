const { default: axios } = require("axios");

new Vue({
    el: '#students-container',
    data: {
        students: [],
    },
    methods : {
        getStudents(){
            axios.get('/students-vue/list').then(response => {
                this.students = response.data.students
            }) 
        },
        createEstudent(){
            axios.get()
        },

        edit(){
            axios.get(student.id).then(response => {
                
            })
        },
        
        update(student){
            axios.put(`students-vue/`, {
                params :{
                    'students': student.id,
                }
            })
        
            
        },

        confirmDestroy(id){
            swal({
                title: "Estas seguro?",
                text: "Una vez eliminado, ¡no podrás revertir la accion!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
              }).then((willDelete) => {
                if (willDelete) {
                 this.destroy(id);
                }
            });
        },

        destroy(id){
            axios.delete('/students-vue/'+id).then(response => {    
                if(response.data.success){
                    swal("Estudiante Eliminado",{
                        icon : 'success'
                    });
                    this.getStudents();
                }
            });
        },
    },
mounted(){
    this.getStudents();
    }
})


