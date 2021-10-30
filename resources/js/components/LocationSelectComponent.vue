<template>
    <div class="form-gruop">
    <p>Address:</p>
    <div class="row">
        <div class="col">
            <select class="form-control" name="province_id" v-model="province_id">
                <option value="null">Tỉnh/Thành phố</option>
                <option v-for="province in provinces" :key="province.id" :value="province.id"> {{province.name}} </option>
            </select>
        </div>
        <div class="col">
            <select class="form-control" v-show="province_id !== null" name="district_id" v-model="district_id">
                <option value="null">Quận/Huyện</option>
                <option v-for="district in districts" :key="district.id" :value="district.id"> {{district.name}} </option>
            </select>
        </div>
        <div class="col">
            <select class="form-control" v-show="district_id !== null" name="ward_id" v-model="ward_id">
                <option value="null">Phường/Xã</option>
                <option v-for="ward in wards" :key="ward.id" :value="ward.id"> {{ward.name}} </option>
            </select>
        </div>
    </div>
    </div>
</template>

<script>
import axios from 'axios';
export default {
    data() {
        return {
            provinces : [],
            province_id : null,
            districts : [],
            district_id : null,
            wards : [],
            ward_id : null
        }
    },
    mounted() {
        this.getProvinces();
    },
    methods: {
        getProvinces() {
            axios.get('/location/province').then( response => {
                this.provinces = response.data; 
            })  
        },
        getDistrict() {
            axios.get("/location/province/district/"+this.province_id+"").then( response => {
                this.districts = response.data; 
            })  
        },
        getWard() {
            axios.get("/location/province/district/ward/"+this.district_id+"").then( response => {
                this.wards = response.data; 
            })  
        },
    },
    watch: {
        province_id() {
            this.getDistrict();
        },
        district_id() {
            this.getWard();
        }
    }
}
</script>