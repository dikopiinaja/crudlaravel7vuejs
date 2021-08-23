<template>
  <div class="container py-4">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">Detail Student</div>
          <div class="card-body">
            <div class="form-group">
              <label htmlFor="title">Name</label>
              <input
                type="text"
                class="form-control"
                id="title"
                v-model="student.name"
                disabled
              />
            </div>

            <div class="form-group">
              <router-link :to="{ name: 'student' }" class="btn btn-secondary"
                >Back</router-link
              >
            </div>
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
    };
  },
  created() {
    let uri = `/api/student/show/${this.$route.params.id}`;
    this.axios.get(uri).then((response) => {
      this.student = response.data;
    });
  },
  method: {},
};
</script>