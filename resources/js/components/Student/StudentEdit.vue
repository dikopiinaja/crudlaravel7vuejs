<template>
  <div class="container py-4">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">Edit Student</div>
          <div class="card-body">
            <div class="alert alert-danger" v-if="errors.length">
              <b>Terdapat kesalahan dalam input data:</b>
              <ul>
                <li v-for="error in errors" :key="error">{{ error }}</li>
              </ul>
            </div>

            <form @submit.prevent="updateStudent">
              <div class="form-group">
                <label htmlFor="name">Name</label>
                <input
                  type="text"
                  class="form-control"
                  id="name"
                  v-model="student.name"
                />
              </div>

              <div class="form-group">
                <router-link :to="{ name: 'student' }" class="btn btn-secondary"
                  >Back</router-link
                >

                <button class="btn btn-primary">Create</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      student: {},
      errors: [],
      name: null,
    };
  },
  created() {
    let uri = `/api/student/edit/${this.$route.params.id}`;
    this.axios.get(uri).then((response) => {
      this.student = response.data;
    });
  },
  methods: {
    updateStudent(e) {
      if (this.$data.student.name != null) {
        this.$swal.fire({
          title: "Success",
          text: "Student created successfully",
          icon: "success",
          timer: 1000,
        });
        let uri = `/api/student/update/${this.$route.params.id}`;
        this.axios.put(uri, this.student).then((response) => {
          this.$router.push({ name: "student" });
        });
        return true;
      }

      this.errors = [];

      if (!this.name) {
        this.errors.push("Name wajib diisi !");
      }

      e.preventDefault();
    },
  },
};
</script>