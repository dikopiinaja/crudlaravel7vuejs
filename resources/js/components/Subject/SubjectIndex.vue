<template>
  <div class="container py-4">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">All subject</div>
          <div class="card-body">
            <router-link :to="{ name: 'subjectCreate' }" class="btn btn-primary"
              >Create new subject</router-link
            >
            <br />
            <br />
            <div class="table-responsive">
              <table class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th width="50" class="text-center">No</th>
                    <th>subject</th>
                    <th width="200" class="text-center">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="(subject, i) in subjects" :key="i">
                    <td width="50" class="text-center">{{ i + 1 }}</td>
                    <td>{{ subject.name }}</td>
                    <td width="200" class="text-center">
                      <div class="btn-group">
                        <router-link
                          :to="{
                            name: 'subjectShow',
                            params: { id: subject.id },
                          }"
                          class="btn btn-primary"
                          >Detail</router-link
                        >
                        <router-link
                          :to="{
                            name: 'subjectEdit',
                            params: { id: subject.id },
                          }"
                          class="btn btn-success"
                          >Edit</router-link
                        >
                        <button
                          class="btn btn-danger"
                          @click.prevent="deletePostsubject(subject.id, i)"
                        >
                          Delete
                        </button>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
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
      subjects: [],
    };
  },
  created() {
    let uri = "api/subject";
    this.axios.get(uri).then((response) => {
      this.subjects = response.data;
    });
  },
  methods: {
    deletePostsubject(id, i) {
      this.$swal
        .fire({
          title: "Apakah kamu yakin?",
          text: "Jika kamu hapus, maka data tidak akan kembali lagi.",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Hapus Deh",
          cancelButtonText: "Nggak Jadi",
        })
        .then((result) => {
          if (result.value) {
            this.$swal.fire({
              title: "Success!",
              text: "subject deleted successfully",
              icon: "success",
              timer: 1000,
            });
            let uri = `api/subject/${id}`;
            this.axios.delete(uri).then((response) => {
              this.subjects.splice(i, 1);
            });
            console.log("Deleted subject with id ..." + id);
          }
        });
    },
    // subject() {
    //   let uri = "api/subject";
    //   this.axios.get(uri).then((response) => {
    //     this.subjects = response.data;
    //   });
    // },
  },
};
</script>