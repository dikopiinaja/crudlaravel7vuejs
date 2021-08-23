<template>
  <div class="container py-4">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">Edit subject</div>
          <div class="card-body">
            <div class="alert alert-danger" v-if="errors.length">
              <b>Terdapat kesalahan dalam input data:</b>
              <ul>
                <li v-for="error in errors" :key="error">{{ error }}</li>
              </ul>
            </div>

            <form @submit.prevent="updateSubject">
              <div class="form-group">
                <label htmlFor="name">Name</label>
                <input
                  type="text"
                  class="form-control"
                  id="name"
                  v-model="subject.name"
                />
              </div>

              <div class="form-group">
                <router-link :to="{ name: 'subject' }" class="btn btn-secondary"
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
      subject: {},
      errors: [],
      name: null,
    };
  },
  created() {
    let uri = `/api/subject/edit/${this.$route.params.id}`;
    this.axios.get(uri).then((response) => {
      this.subject = response.data;
    });
  },
  methods: {
    updateSubject(e) {
      if (this.$data.subject.name != null) {
        this.$swal.fire({
          title: "Success",
          text: "subject created successfully",
          icon: "success",
          timer: 1000,
        });
        let uri = `/api/subject/update/${this.$route.params.id}`;
        this.axios.put(uri, this.subject).then((response) => {
          this.$router.push({ name: "subject" });
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