<script setup>
import Layout from '@/components/backend/Layout.vue'
import { ref, onMounted } from "vue";
import axios from 'axios';

const ds_theloai = ref([]);

onMounted(() => {
    getTheLoai();
});

const getTheLoai = () => {
    axios.post('http://127.0.0.1:8000/api/theloai')
        .then((response) => {
            ds_theloai.value = response.data.ds_theloai;

            console.log(ds_theloai.value);
        })
        .catch((error) => {
            console.log(error);
        });
};
</script>

<template>
    <Layout>
        <template #AdminContent>
            <div class="row project-wrapper">
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
                            <td>{{ theloai.id }}</td>
                            <td>{{ theloai.ten_the_loai }}</td>
                            <td>{{ theloai.mo_ta }}</td>
                            <td>
                                <span v-if="theloai.trang_thai === 1" class="badge text-bg-success">Đang thịnh hành</span>
                                <span v-if="theloai.trang_thai === 2" class="badge text-bg-info">Cổ điển</span>
                                <span v-if="theloai.trang_thai === 3" class="badge text-bg-secondary">Ưa chuộng</span>
                            </td>
                            <td>
                                <button type="button" class="btn btn-primary w-25">Sửa</button>
                                <button type="button" class="btn btn-danger mx-2 w-25">Xóa</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </template>
    </Layout>
</template>

<style scoped></style>
