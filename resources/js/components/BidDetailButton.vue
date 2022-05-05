<template>
    <div>
        <button class = "bidDetailBtn btn btn-primary" v-on:click="detail($event)">Chi tiết</button>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        methods: {
            detail(event) {
                var moreText = event.target.parentNode.parentNode.parentNode.getElementsByClassName("dt")[0];
                var moreText2 = event.target.parentNode.parentNode.parentNode.getElementsByClassName("dt")[1];
                var detailBtn = event.target.parentNode.getElementsByClassName("bidDetailBtn")[0];
                if (moreText.style.display !== "none") {
                    detailBtn.innerHTML = "Chi tiết";
                    moreText.style.display = "none";
                    moreText2.style.display = "none";
                } else {
                    detailBtn.innerHTML = "Thu gọn";
                    moreText.style.display = "inline";
                    moreText2.style.display = "inline";
                }
            }
        }
    }
    
</script>
