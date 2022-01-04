<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header page-title">About Us Component</div>

          <div class="card-body body-content">
            Hi, Online Web tutor. I am About Us Page
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  mounted() {
    console.log("This is about component");
  },
};
</script>

<style scoped>
.page-title {
  background: gray;
  padding: 10px;
  text-align: center;
  width: 50%;
  color: white;
}
.body-content {
  border: 1px solid;
  width: 50%;
  padding: 9px;
  text-align: center;
}
</style>