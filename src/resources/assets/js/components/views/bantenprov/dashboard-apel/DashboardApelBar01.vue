<template>
  <div style="width: 100%; height: 600px;">
    <IEcharts :option="bar" :loading="loading" :resizable="true"></IEcharts>
  </div>
</template>

<script>
import IEcharts from 'vue-echarts-v3/src/full.js';

export default {
  components: {
    IEcharts
  },
  data () {
    return {
      loading: false,
      bar: {
        title: {
          text: 'Absensi Apel',
          subtext: '01-01-2018',
          textStyle: {
            fontSize: 16,
            fontWeight: 'normal',
            fontStyle: 'normal',
            color: '#fff'
          }
        },
        tooltip: {
          trigger: 'axis',
          axisPointer: {
            type: 'shadow'
          }
        },
        legend: {
          data: ['Wajib hadir', 'Peserta']
        },
        grid: {
          left: '3%',
          right: '4%',
          bottom: '3%',
          containLabel: true
        },
        xAxis: {
          type: 'value',
          boundaryGap: [0, 0.01]
        },
        yAxis: {
          type: 'category',
          data: []
        },
        series: [
        {
          name: 'Wajib hadir',
          type: 'bar',
          data: []
        },
        {
          name: 'Peserta',
          type: 'bar',
          data: []
        }
        ]
      }
    }
  },
  mounted: function () {
    /*console.log(this.bar.series[0].name)
    let data_interval = [[19325, 23438, 31000, 121594, 134141, 681807, 19325, 23438, 31000, 121594, 19325, 23438, 31000, 121594, 134141, 681807, 19325, 23438, 31000, 121594, 19325, 23438, 31000, 121594, 134141, 681807, 19325, 23438, 31000, 121594, 19325, 23438, 31000, 121594, 134141, 681807, 19325, 23438, 31000, 121594],[18203, 23489, 29034, 104970, 131744, 630230, 29034, 104970, 131744, 630230, 18203, 23489, 29034, 104970, 131744, 630230, 29034, 104970, 131744, 630230, 18203, 23489, 29034, 104970, 131744, 630230, 29034, 104970, 131744, 630230, 18203, 23489, 29034, 104970, 131744, 630230, 29034, 104970, 131744, 630230]]

    let i = 0;
    setInterval(()=>{

      this.bar.series[0].data = data_interval[i];
      console.log(this.bar.series[0].data[0])
      i++;
      if(i == data_interval.length)
      {
        i =0;
      }
    },4000)*/

    axios.get('/json/bantenprov/dashboard-apel/dashboard-apel-010.json').then(response => {

      let ke = 0;

      var res = response.data;

      /*this.bar.xAxis.data = Object.values(res[0].xAxis.data);
      this.bar.series[0].data = res[0].series[0].data;
      this.bar.title.text = res[0].xAxis.region + ' ' + res[0].xAxis.name + ' ' + res[0].xAxis.yyyy;*/

      this.bar.title.subtext = res[0].time;
      this.bar.yAxis.data = res[0].yAxis.data;
      this.bar.series[0].data = res[0].series[0].data;
      this.bar.series[1].data = res[0].series[1].data;

      //console.log(res[0].series[1].data);

      // interval
      let i = 0;

      setInterval(() => {

        this.bar.title.subtext = res[i].time;
        this.bar.yAxis.data = res[i].yAxis.data;
        this.bar.series[0].data = res[i].series[0].data;
        this.bar.series[1].data = res[i].series[1].data;

        i++;

        if(i == res.length) {
          i = 0;
        }
      }, 4000);
    })
    .catch(function(error) {
      // error
    });

  }
}
</script>
