<?php
/**
 * @package territorios_de_cuidado
 */
get_header();
?>
<script src="https://cdn.amcharts.com/lib/5/index.js"></script>
<script src="https://cdn.amcharts.com/lib/5/map.js"></script>
<script src="https://cdn.amcharts.com/lib/5/geodata/brazilLow.js"></script>
<script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>

<style>
  .am5-tooltip-container {
    background: transparent !important;
    border: none !important;
    padding: 0px !important;
    box-shadow: none !important;
  }

  .tooltip-card {
    position: relative;
    background: #fff;
    border-radius: 20px;
    max-width: 400px;
    box-shadow: 0 5px 5px rgba(0, 0, 0, 0.1);
    padding: 16px;
    font-family: sans-serif;
    color: #333;
    font-size: 13px;
    overflow: hidden;
    max-height: 600px;
    margin: 20px;
  }

  .tooltip-card::after {
    content: "";
    position: absolute;
    bottom: -10px;
    left: 20px;
    border-width: 10px 10px 0 10px;
    border-style: solid;
    border-color: #fff transparent transparent transparent;
  }

  .pulse-wrapper {
    position: relative;
  }

  .pulse-ring {
    position: absolute;
    top: 50%;
    left: 50%;
    width: 20px;
    height: 20px;
    transform: translate(-50%, -50%);
    border: 2px solid rgba(255, 193, 7, 0.6);
    border-radius: 50%;
    animation: pulse-ring 2s ease-out infinite;
  }

  @keyframes pulse-ring {
    0% {
      transform: translate(-50%, -50%) scale(0.8);
      opacity: 1;
    }

    70% {
      transform: translate(-50%, -50%) scale(1.6);
      opacity: 0;
    }

    100% {
      transform: translate(-50%, -50%) scale(0.8);
      opacity: 0;
    }
  }

  .page-header-container {
    background-color: #E5EEFF;
  }

  .page-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    position: relative;
    overflow: hidden;

    &>h1 {
      padding: 4rem 0;
      font-family: 'Lilita One', sans-serif;
      font-size: 48px;
    }

    &>div {
      position: absolute;
      right: 0;
      top: 50%;
      transform: translate(0, -50%);
      min-height: 0;

      &>img {
        max-width: 200px;
        height: 100%;
        object-fit: contain;
      }
    }
  }

  div#chartdiv {
    width: 100%;
    height: 750px;
  }
</style>

<!-- HEADER TITLE START  -->
<div class="page-header-container">
  <div class="container">
    <div class="page-header">
      <h1 class="text-primary">Territórios</h1>

      <div class="d-none d-md-block">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/territorios-header-img.svg" alt="">
      </div>
    </div>
  </div>
</div>
<!-- HEADER TITLE END -->

<div class="bg-primary">
  <div class="container py-4">
    <p class="text-white m-0 text-justify text-gotham">
      A promoção da saúde, portanto, necessita ser um campo que valorize os
      saberes populares e suas práticas. O envolvimento da participação
      social, com equidade, justiça e fortalecimento da autonomia dos
      sujeitos e do coletivo, é essencial para ações promotoras de saúde,
      das quais emergem suas diversas experiências, desvelando suas
      potencialidades e vulnerabilidades, seus interesses e conflitos.<br /><br />
      Conheça os 15 territórios de cuidado que integram o nosso projeto.
      Saiba onde estamos atuando, quais ações estão em andamento e as redes
      locais envolvidas.
    </p>
  </div>
</div>

<!-- MAIN CONTENT START -->
<main>
  <section class="container overflow-hidden">
    <div id="chartdiv"></div>
  </section>
</main>
<!-- MAIN CONTENT END -->

<script>
  am5.ready(function () {
    const root = am5.Root.new("chartdiv");
    root.setThemes([am5themes_Animated.new(root)]);

    const chart = root.container.children.push(
      am5map.MapChart.new(root, {
        panX: "none",
        panY: "none",
        wheelX: "none",
        wheelY: "none",
        pinchZoom: false,
        projection: am5map.geoMercator()
      })
    );

    const brazilSeries = chart.series.push(
      am5map.MapPolygonSeries.new(root, {
        geoJSON: am5geodata_brazilLow
      })
    );

    const statesData = {
      "BR-PA": { name: "Pará" },
      "BR-MA": { name: "Maranhão" },
      "BR-PI": { name: "Piauí" },
      "BR-RN": { name: "Rio Grande do Norte" },
      "BR-CE": { name: "Ceará" },
      "BR-PB": { name: "Paraíba" },
      "BR-BA": { name: "Bahia" },
      "BR-TO": { name: "Tocantins" }
    };

    brazilSeries.mapPolygons.template.setAll({
      interactive: false,
      fill: am5.color(0xdddddd),
      templateField: "polygonSettings"
    });

    brazilSeries.mapPolygons.each((polygon) => {
      const id = polygon.dataItem.get("id");
      if (statesData[id]) {
        polygon.set("interactive", true);
        polygon.states.create("hover", {
          fill: am5.color("#357a3a")
        });
      }
    });

    brazilSeries.mapPolygons.template.states.create("hover", {
      fill: am5.color("#357a3a")
    });

    brazilSeries.data.setAll(
      Object.entries(statesData).map(([id, state]) => ({
        id,
        name: state.name,
        polygonSettings: {
          fill: am5.color("#469B49")
        }
      }))
    );

    const pointSeries = chart.series.push(am5map.MapPointSeries.new(root, {}));

    pointSeries.bullets.push(function () {
      const wrapper = document.createElement("div");
      wrapper.className = "pulse-wrapper";

      const ring = document.createElement("div");
      ring.className = "pulse-ring";
      wrapper.appendChild(ring);

      const container = am5.Container.new(root, {
        width: 18,
        height: 18,
        centerX: am5.p50,
        centerY: am5.p50,
        tooltipY: 0
      });

      const circle = am5.Circle.new(root, {
        radius: 6,
        fill: am5.color("#FFC107"),
        tooltipHTML: "{tooltipHTML}",
        cursorOverStyle: "pointer",
        interactive: true,
        strokeOpacity: 0,
        strokeWidth: 2,
        stroke: am5.color("#FFC107")
      });

      // Animate "scale" to create pulse effect
      circle.animate({
        key: "scale",
        from: 1,
        to: 1.6,
        duration: 3000,
        loops: Infinity,
        easing: am5.ease.yoyo(am5.ease.cubic) // 👈 back-and-forth
      });

      // ✅ Verifica se o tooltip já está criado antes de manipular
      root.events.once("frameended", function () {
        const tooltip = circle.getTooltip();
        if (tooltip) {
          tooltip.get("background").setAll({
            fillOpacity: 0,
            strokeOpacity: 0
          });
        }
      });

      container.children.push(circle);

      // ✅ Protege o acesso ao native DOM
      setTimeout(() => {
        if (circle._display && circle._display._native) {
          circle._display._native.appendChild(wrapper);
        }
      }, 0);

      return am5.Bullet.new(root, {
        sprite: container
      });
    });

    const pointsData = [
      {
        id: "ponto1",
        coordinates: [-49.5, -1.0],
        title: "Breves",
        states: ["PA"],
        body: `
    Anajás; Bagre;
    Curralinho; Gurupá;
    Melgaço; Muaná; Oeiras
    do Pará; Portel; e São
    Sebastião da Boa Vista.`,
      },
      {
        id: "ponto2",
        coordinates: [-43.5, -4.7],
        title: "Codó",
        states: ["MA", "PI"],
        body: `
    <strong>MA</strong> Alcântara, Aldeias Altas, Barreirinhas, Caxias, Chapadinha, Coroatá, Dom Pedro, Itapecuru, Santo Antônio dos Lopes, Parnarama, Pedreiras, São Luís<br><br>
    <strong>PI</strong> José de Freitas, Piripiri, Teresina, União`,
      },
      {
        id: "ponto3",
        coordinates: [-37.34, -5.19],
        title: "Mossoró",
        states: ["RN", "CE", "PB"],
        body: `
    <strong>RN</strong> Açu, Apodi, Baraúna, Caraúba, Governador Dix-Sept, Grossos, Ipanguaçu, Macau, Natal, Umarizal, Upanema<br><br>
    <strong>CE</strong> Aracati, Fortim, Icapuí, Russas<br><br>
    <strong>PB</strong> Cajazeirinhas, Cajazeiras, Catolé do Rocha, Pombal`,
      },
      {
        id: "ponto4",
        coordinates: [-38.96, -12.6],
        title: "Cachoeira",
        states: ["BA"],
        body: `
    Alagoinhas, Cruz das Almas, Feira de Santana, Itacaré, Maragogipe, São Felix, Salinas da Margarida, Santo Amaro, Santo Estêvão, São Sebastião do Passé, Simões Filho`,
      },
      {
        id: "ponto5",
        coordinates: [-49.12, -5.37],
        title: "Marabá",
        states: ["PA", "TO", "MA"],
        body: `
    <strong>MA</strong> Açailândia, Buritirana, Estreito, Imperatriz, Montes Altos, São Francisco do Brejão<br><br>
    <strong>PA</strong> Dom Eliseu, Parauapebas, Rondon do Pará, Ulianópolis<br><br>
    <strong>TO</strong> Araguatins, Praia Norte, Sítio Novo do Tocantins`,
      },
    ];


    const tooltipFromPoint = (point) => {
      const badges = point.states.map(
        (sigla) => `<span class="badge badge-warning m-1">${sigla}</span>`
      ).join("");
      return `
      <div class="tooltip-card">
        <div style="font-weight: bold; font-size: 18px; margin-bottom: 6px;">
          ${point.title} ${badges}
        </div>
        <div>${point.body}</div>
      </div>
    `;
    };

    pointSeries.data.setAll(
      pointsData.map((p) => ({
        id: p.id,
        geometry: { type: "Point", coordinates: p.coordinates },
        tooltipHTML: tooltipFromPoint(p)
      }))
    );
  });

</script>

<?php
get_footer();
