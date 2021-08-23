<template>
  <div class="container py-4">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">Detail subject</div>
          <div class="card-body">
            <div class="form-group">
              <label htmlFor="name">Name</label>
              <input
                type="text"
                class="form-control"
                id="name"
                v-model="subject.name"
                disabled
              />
            </div>

            <div class="form-group">
              <router-link :to="{ name: 'subject' }" class="btn btn-secondary"
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
      subject: {},
    };
  },
  created() {
    let uri = `/api/subject/show/${this.$route.params.id}`;
    this.axios.get(uri).then((response) => {
      this.subject = response.data;
    });
  },
  method: {},
};
</script>