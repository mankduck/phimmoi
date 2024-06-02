<script setup>
import Layout from '@/components/backend/Layout.vue'
import { ref, onMounted, reactive } from "vue"
import axios from "axios"
import { get, add } from '@/utils/utils.js';

// Khai báo biến cần dùng
const isModalOpen = ref(false);
const ds_nhomTk = ref([])
const chitiet_nhomTk = ref({
    ten_nhom: "",
    trang_thai: "",
    mo_ta: "",
});
const errors = ref([])
const theloai = {
    ten_nhom: "",
    trangthai: "",
    mota: "",
}

// Tự động chạy
onMounted(() => {
    getNhomTk()
});
async function getNhomTk() {
    const response = await get('nhom-tai-khoan')
    ds_nhomTk.value = response.ds_nhomTk
}

async function addNhomTk() {
    await add('nhom-tai-khoan')
}
const editNhomTk = async (id) => {
    try {
        const response = await axios.get(`http://127.0.0.1:8000/api/nhom-tai-khoan/show/${id}`);
        if (response.status === 200) {
            chitiet_nhomTk.value = response.data;
            // console.log(chitiet_nhomTk);
        }
    } catch (error) {
        console.log(error);
    }
};
const updateNhomTk = async (id) => {
    try {
        const response = await axios.post(`http://127.0.0.1:8000/api/nhom-tai-khoan/update/${id}`, chitiet_nhomTk.value);
        if (response.status === 200) {
            alert("Chỉnh sửa thành công!");
            await getNhomTk(); // Gọi hàm này để cập nhật danh sách (nếu cần await)
            isModalOpen.value = false; // Đóng popup
            console.log(12314);
            // chitiet_nhomTk.value = {
            //     ten_nhom: "",
            //     trang_thai: "",
            //     mo_ta: "",
            // };
        }
    } catch (error) {
        console.log(error);
    }
};
const deleteTheLoai = async (id) => {
    const confirmDelete = window.confirm("Bạn thực sự muốn xóa !!");
    if (confirmDelete) {
        try {
            const response = await axios.get(`http://127.0.0.1:8000/api/nhom-tai-khoan/delete/${id}`);
            if (response.status === 200) {
                alert("Xóa thành công");
                await getNhomTk();
            }
        } catch (error) {
            console.log(error);
        }
    }
};


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
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal">
                                            <i class="ri-add-line align-bottom me-1"></i> Thêm Nhóm Tài Khoản
                                        </button>

                                        <!-- Modal thêm -->
                                        <div class="modal fade" id="exampleModal" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                            <b>Thêm Nhóm Tài Khoản</b>
                                                        </h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form @submit.prevent="addNhomTk()">
                                                            <div class="mb-3">
                                                                <label for="exampleFormControlInput1"
                                                                    class="form-label"><b>Tên Nhóm</b></label>
                                                                <input type="text" class="form-control"
                                                                    id="exampleFormControlInput1"
                                                                    placeholder="tên thể loại" />
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="exampleFormControlInput1"
                                                                    class="form-label"><b>Trạng thái</b></label>
                                                                <select class="form-select"
                                                                    aria-label="Default select example">
                                                                    <option value="" selected>
                                                                        --Thể loại--
                                                                    </option>
                                                                    <option value="1">Kích hoạt</option>
                                                                    <option value="2">Không kích hoạt</option>
                                                                </select>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="exampleFormControlTextarea1"
                                                                    class="form-label"><b>Mô tả</b></label>
                                                                <textarea class="form-control"
                                                                    id="exampleFormControlTextarea1" rows="3"
                                                                    placeholder="mô tả"></textarea>
                                                            </div>

                                                            <div>
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">
                                                                    Close
                                                                </button>
                                                                <button type="submit" class="btn btn-primary mx-2">
                                                                    Thêm ngay
                                                                </button>
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
                                            <tr v-for="nhomTk in ds_nhomTk" :key="nhomTk.id">
                                                <td>#{{ nhomTk.id }}</td>
                                                <td>{{ nhomTk.ten_nhom }}</td>
                                                <td>{{ nhomTk.mo_ta }}</td>
                                                <td>
                                                    <span v-if="nhomTk.trang_thai === 1"
                                                        class="badge text-bg-success w-75">Kích hoạt</span>
                                                    <span v-if="nhomTk.trang_thai === 2"
                                                        class="badge text-bg-info w-75">Không kích hoạt</span>
                                                </td>
                                                <td>
                                                    <button @click="editNhomTk(nhomTk.id)" type="button"
                                                        class="btn btn-primary w-25" data-bs-toggle="modal"
                                                        data-bs-target="#exampleModal1">
                                                        Sửa
                                                    </button>
                                                    <button @click="deleteTheLoai(nhomTk.id)" type="button"
                                                        class="btn btn-danger mx-2 w-25">
                                                        Xóa
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <!-- Modal sửa -->
                                    <div class="modal fade" id="exampleModal1" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                        <b>Sửa Nhóm Tài Khoản</b>
                                                    </h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>

                                                <div class="modal-body">
                                                    <form @submit.prevent="updateNhomTk(chitiet_nhomTk.id)">
                                                        <div class="mb-3">
                                                            <label for="exampleFormControlInput1"
                                                                class="form-label"><b>Tên thể loại</b></label>
                                                            <input type="text" class="form-control"
                                                                id="exampleFormControlInput1"
                                                                v-model="chitiet_nhomTk.ten_nhom" />
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="exampleFormControlInput1"
                                                                class="form-label"><b>Trạng thái</b></label>
                                                            <select class="form-select"
                                                                aria-label="Default select example"
                                                                v-model="chitiet_nhomTk.trang_thai">
                                                                <option value="1"
                                                                    :selected="chitiet_nhomTk.trang_thai == 1">
                                                                    Kích hoạt
                                                                </option>
                                                                <option value="2"
                                                                    :selected="chitiet_nhomTk.trang_thai == 2">
                                                                    Không kích hoạt
                                                                </option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="exampleFormControlTextarea1"
                                                                class="form-label"><b>Mô tả</b></label>
                                                            <textarea class="form-control"
                                                                id="exampleFormControlTextarea1" rows="3"
                                                                placeholder="mô tả"
                                                                v-model="chitiet_nhomTk.mo_ta"></textarea>
                                                        </div>

                                                        <div>
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">
                                                                Close
                                                            </button>
                                                            <button type="submit" :class="{ 'show': isModalOpen }"
                                                                class="btn btn-primary mx-2">
                                                                Sửa ngay
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end mt-3">
                                    <div class="pagination-wrap hstack gap-2">
                                        <a class="page-item pagination-prev disabled" href="#">
                                            Previous
                                        </a>
                                        <ul class="pagination listjs-pagination mb-0"></ul>
                                        <a class="page-item pagination-next" href="#"> Next </a>
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
