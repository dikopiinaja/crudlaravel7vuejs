<template>
  <div class="container py-4">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">All Student</div>
          <div class="card-body">
            <router-link :to="{ name: 'create' }" class="btn btn-primary"
              >Create new Student</router-link
            >
            <br />
            <br />
            <div class="table-responsive">
              <table class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th width="50" class="text-center">No</th>
                    <th>Student</th>
                    <th width="200" class="text-center">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="(student, s) in students" :key="student.id">
                    <td width="50" class="text-center">{{ s + 1 }}</td>
                    <td>{{ student.name }}</td>
                    <td width="200" class="text-center">
                      <div class="btn-group">
                        <router-link
                          :to="{ name: 'show', params: { id: student.id } }"
                          class="btn btn-primary"
                          >Detail</router-link
                        >
                        <router-link
                          :to="{ name: 'edit', params: { id: student.id } }"
                          class="btn btn-success"
                          >Edit</router-link
                        >
                        <button
                          class="btn btn-danger"
                          @click="deletePost(student.id)"
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
      students: [],
    };
  },
  created() {
    let uri = "api/student";
    this.axios.get(uri).then((response) => {
      this.students = response.data;
    });
  },
  methods: {
    deletePost(id) {
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
              text: "Student deleted successfully",
              icon: "success",
              timer: 1000,
            });
            let uri = `api/student/${id}`;
            this.axios.delete(uri).then((response) => {
              this.students.splice(this.students.indexOf(id), 1);
            });
            console.log("Deleted student with id ..." + id);
          }
        });
    },
    mounted() {
      this.load(s.i);
    },
  },
};
</script>