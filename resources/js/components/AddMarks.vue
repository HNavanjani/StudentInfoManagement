<template>
  <div>
    <h3 class="text-center">Add Marks</h3>
  <div class="container h-100 d-flex justify-content-center">
    <form @submit.prevent="addMarks">
      <label>Student</label>

      <select
        class="form-control"
        v-model="mark.student_id"
        @change="getStudents()"
      >
        <option value="0">Select Student</option>
        <option v-for="data in students" :key="data.id" :value="data.id">
          {{ data.name }}
        </option>
      </select>

      <label>Subject</label>

       <select
        class="form-control"
        v-model="mark.subject_id"
        @change="getSubjects()"
      >
        <option value="0">Select Subject</option>
        <option v-for="data in subjects" :key="data.id" :value="data.id">
          {{ data.name }}
        </option>
      </select>
      
      
      <label>Mark</label>
      <input type="numeric" class="form-control" v-model="mark.mark" />
      <br/>
      <button type="submit" class="btn btn-success">Add Marks</button>
    </form>
  </div>
  </div>
</template>
 
<script>
export default {
  data() {
    return {
      mark: {},
      students: [],
      subjects: [],
    };
  },

  methods: {
    getStudents: function () {
      axios.get("http://localhost:8000/api/students").then(
        function (response) {
          this.students = response.data;
        }.bind(this)
      );
    },
     getSubjects: function () {
      axios.get("http://localhost:8000/api/subjects").then(
        function (response) {
          this.subjects = response.data;
        }.bind(this)
      );
    },

    addMarks() {
      this.axios
        .post("http://localhost:8000/api/student/mark", this.mark)
        .then((response) => this.$router.push({ name: "home" }));
    },
  },
  created: function () {
    this.getStudents();
     this.getSubjects();
  },
};
</script>