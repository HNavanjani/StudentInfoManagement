<template>
    <div>
        <br/>
        <h3 class="text-center">Add Student</h3>
       <div class="container h-100 d-flex justify-content-center">
<form @submit.prevent="addStudent">
  <div class="form-group">
    <label>Name</label>
    <input type="text" class="form-control" v-model="student.name" placeholder="Enter student's name">
  </div>
  <button type="submit" class="btn btn-success">Add Student</button>
</form>
       </div>
    </div>
</template>
 
<script>
    export default {
        data() {
            return {
                student: {}
            }
        },
        methods: {
            addStudent() {
 
                this.axios
                    .post('http://localhost:8000/api/student', this.student)
                    .then(response => (
                        this.$router.push({name: 'home'})
                    ))
                   
            }
        }
    }
</script>