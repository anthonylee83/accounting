<template>
    <div class="search-wrapper">
        <div class="input-group search">
            <input class="form-control" v-model="searchString" type="search" area-label="Search" />
            <div class="input-group-append">
                <button class="btn btn-outline-secondary"><i class="fas fa-search"></i></button>
            </div>
        </div>
        <div class="results">
            <div v-for="result in results" :key="result.slug" class="result">
                <a :href="_url(result.id)">{{result[display_field]}}</a>
            </div>
        </div>
        <div class="errors">
            {{error_msg}}
        </div>
    </div>
</template>

<script>
    export default {
        props:{
            display_field:{
                type:String,
                default:null
            },
            search_url:{
                type:String,
                default:null
            },
            link_url:{
                type:String,
                derfault:null
            }
        },
        data:function(){
            return {
                searchString:"",
                results:[],
                error_msg: null
            }
        },
        methods:{
          _url:function(val){
              return this.link_url + val;
          }
        },
        watch:{
            searchString:function(val){
                if(val == ""){
                    this.results = [];
                    return;
                }
                    
                 axios.get(this.search_url + val)
                .then(response =>{
                    if(this.searchString !== "")
                        this.results = response.data;
                })
                .catch(error=>{
                    this.error_msg = ('An error has occurred');
                    this.results =[];
                })
            }
        }
    }
</script>
<style>
.search-wrapper{
    margin-bottom: 1rem;
}
    input[type=search]{
        border:#777;
    }
    .results{
        background-color:#fff;
        width:60%;  
        position:absolute;
        margin:0px auto;
    }
    .result{
        float:left;
        position:relative;
        padding:10px;
        background:#fff;
        border:1px solid #777;
        width:100%;
    }
</style>