<script setup>
import Layout from '@/components/backend/Layout.vue'
import { ref, onMounted, reactive } from "vue";
import axios from 'axios';

// Khai báo biến cần dùng
const ds_theloai = ref([]);
const errors = ref([]);
const data_addTheLoai = reactive({
    nameTheLoai: "",
    trangThaiTheLoai: [],
    moTaTheLoai: "",
});

// Tự động chạy
onMounted(() => {
    getTheLoai();
});

const getTheLoai = () => {
    axios.post('http://127.0.0.1:8000/api/theloai')
        .then((response) => {
            ds_theloai.value = response.data.ds_theloai;

            // console.log(ds_theloai.value);
        })
        .catch((error) => {
            console.log(error);
        });
};

function deleteTheLoai(id) {
    const confirmDelete = window.confirm('Bạn thực sự muốn xóa !!');

    if (confirmDelete) {

        axios.get(`http://127.0.0.1:8000/api/theloai/delete/${id}`)
            .then(response => {
                getTheLoai();
            })
            .catch((error) => {
                console.log(error);
            });

    }
}

function addTheLoai() {

    axios.post("http://127.0.0.1:8000/api/theloai/store", data_addTheLoai)
        .then((response) => {
            console.log(response);
        })
        .catch((error) => {
            errors.value = error.response.data.errors;
        });
}

</script>

<template>
    <Layout>
        <template #AdminContent>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card" id="leadsList">
                        <div class="card-header border-0">
                            <div class="row g-4 align-items-center">
                                <div class="col-sm-3">
                                    <div class="search-box">
                                        <input type="search" class="form-control search" placeholder="Search for..." />
                                        <i class="ri-search-line search-icon"></i>
                                    </div>
                                </div>
                                <div class="col-sm-auto ms-auto">
                                    <div class="hstack gap-2">
                                        <button class="btn btn-soft-danger" id="remove-actions"
                                            onClick="deleteMultiple()">
                                            <i class="ri-delete-bin-2-line"></i>
                                        </button>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary " data-bs-toggle="modal"
                                            data-bs-target="#exampleModal">
                                            <i class="ri-add-line align-bottom me-1"></i> Thêm Thể Loại
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel"><b>Thêm Thể
                                                                Loại</b>
                                                        </h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form @submit.prevent="addTheLoai()">
                                                            <div class="mb-3">
                                                                <label for="exampleFormControlInput1"
                                                                    class="form-label"><b>Tên thể loại</b></label>
                                                                <input type="text" class="form-control"
                                                                    id="exampleFormControlInput1"
                                                                    placeholder="tên thể loại" v-model="nameTheLoai">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="exampleFormControlInput1"
                                                                    class="form-label"><b>Trạng thái</b></label>
                                                                <select class="form-select"
                                                                    aria-label="Default select example"
                                                                    v-model="trangThaiTheLoai">
                                                                    <option selected hidden>--Thể loại--</option>
                                                                    <option value="1">Kích hoạt</option>
                                                                    <option value="2">Không kích hoạt</option>
                                                                </select>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="exampleFormControlTextarea1"
                                                                    class="form-label"><b>Mô tả</b></label>
                                                                <textarea class="form-control"
                                                                    id="exampleFormControlTextarea1" rows="3"
                                                                    placeholder="mô tả"
                                                                    v-model="moTaTheLoai"></textarea>
                                                            </div>

                                                            <div>
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary mx-2">Thêm
                                                                    ngay</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div>
                                <div class="table-responsive table-card">
                                    <table class="table table-hover text-center">
                                        <thead>
                                            <tr>
                                                <th>Mã thể loại</th>
                                                <th>Tên thể loại</th>
                                                <th>Mô tả</th>
                                                <th>Trạng thái</th>
                                                <th>Chức năng</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="theloai in ds_theloai" :key="theloai.id">
                                                <td>#{{ theloai.id }}</td>
                                                <td>{{ theloai.ten_the_loai }}</td>
                                                <td>{{ theloai.mo_ta }}</td>
                                                <td>
                                                    <span v-if="theloai.trang_thai === 1"
                                                        class="badge text-bg-success">Đang thịnh
                                                        hành</span>
                                                    <span v-if="theloai.trang_thai === 2" class="badge text-bg-info">Cổ
                                                        điển</span>
                                                    <span v-if="theloai.trang_thai === 3"
                                                        class="badge text-bg-secondary">Ưa chuộng</span>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-primary w-25">Sửa</button>
                                                    <button @click="deleteTheLoai(theloai.id)" type="button"
                                                        class="btn btn-danger mx-2 w-25">Xóa</button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="d-flex justify-content-end mt-3">
                                    <div class="pagination-wrap hstack gap-2">
                                        <a class="page-item pagination-prev disabled" href="#">
                                            Previous
                                        </a>
                                        <ul class="pagination listjs-pagination mb-0"></ul>
                                        <a class="page-item pagination-next" href="#">
                                            Next
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end col-->
            </div>
        </template>
    </Layout>
</template>

<style scoped></style>
