<template>
    <div>
        <br/>
        <h3 class="text-center">Students' Marks</h3><br/>
 <div class="container h-100 d-flex justify-content-center">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Subject ID</th>
                <th>Student ID</th>
                <th>Mark</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="mark in marks" :key="mark.id">
                <td>{{ mark.subject_id }}</td>
                <td>{{ mark.student_id }}</td>
                <td>{{ mark.mark }}</td>
            </tr>
            </tbody>
        </table>
    </div>
    </div>
</template>
 
<script>
    export default {
        data() {
            return {
                marks: []
            }
        },
        created() {
            this.axios
                .get('http://localhost:8000/api/marks')
                .then(response => (
                    this.marks = response.data
                ));
        },
      
    }
</script>