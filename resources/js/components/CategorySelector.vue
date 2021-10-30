<template>
      <div class="form-gruop">
        <p style="display:inline-block">Category:</p>
        <span class="catogoryList">
            <button class="categoryItem btn btn-success" v-for="(category,index) in selectCategories" :key="category.id">
            {{category.name}}
            <span class="removecategoryItem" @click="selectCategories.splice(index,1)">x</span>
            </button>
        </span>
        <div class="dropdown" style="display:inline-block">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Vui lòng chọn
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <input type="text" class="form-control" v-model="keyword" v-on:input="debounceInput" >
              <a v-for="category in categories" :key="category.id"  class="dropdown-item" href="#"
              @click.prevent="selectCategories.push(category)"
              >{{ category.name }}</a>
            </div>
            <input type="hidden" name="category_ids[]" v-for="category in categories" :key="category.id" :value="category.id">
        </div>

      </div>
</template>

<script>
import axios from 'axios'
export default {
  data() {
    return {
      keyword: '',
      categories : [],
      selectCategories : [],

    }
  },
  methods: {
    getCategories() {
      axios.get("/resource/categories?keyword="+this.keyword).then( response => {
        this.categories = response.data;
      })
    },
    debounceInput: _.debounce(function () {
    this.getCategories();
  }, 1000)
  },
  watch: {
    // keyword() {
    //     this.getCategories();
    // }
  },
}
</script>

<style>
.categoryItem {
  margin-right: 5px;
}
.removecategoryItem:hover {
  color: red;
}
</style>