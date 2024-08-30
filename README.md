[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/carpenstar/bybitapi-sdk-spot/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/carpenstar/bybitapi-sdk-spot/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/carpenstar/bybitapi-sdk-spot/badges/build.png?b=master)](https://scrutinizer-ci.com/g/carpenstar/bybitapi-sdk-spot/build-status/master)
[![Code Intelligence Status](https://scrutinizer-ci.com/g/carpenstar/bybitapi-sdk-spot/badges/code-intelligence.svg?b=master)](https://scrutinizer-ci.com/code-intelligence)
# ByBitAPI - spot-trading package

**Дисклэймер: это неофициальный SDK для интеграции с биржей ByBit.   
Поддержка функционала осуществляется только в пределах зоны отвественности кода и при возможности со стороны разработчика**


## Требования

- PHP >= 7.4

## Установка

```sh 
composer require carpenstar/bybitapi-sdk-spot
```

## Содержание:

<table>
  <tr>
    <th colspan="5" style="text-align: left; font-weight: bold">MARKET DATA</th>
  </tr>
  <tr>
    <th style="text-align: center; font-weight: bold">Endpoint</th>
    <th style="text-align: center; font-weight: bold">Access</th>
    <th style="text-align: center; font-weight: bold">View</th>
    <th style="text-align: center; font-weight: bold">Offical documentation</th>
    <th style="text-align: center; font-weight: bold">Language</th>
  </tr>
  <tr>
    <td>
      <a href="https://github.com/carpenstar/bybitapi-sdk-spot#market-data---best-bid-ask-price">Best Bid Ask Price</a>
    </td>
    <td><b>publicEndpoint</b></td>
    <td style="text-align: center" align="center"><a href="https://github.com/carpenstar/bybitapi-sdk-spot/tree/master/src/Spot/MarketData/BestBidAskPrice">view</a></td>
    <td style="text-align: center" align="center"><a href="https://bybit-exchange.github.io/docs/spot/public/bid-ask" target="_blank">view</a></td>
    <td style="text-align: center" align="center">
        <a href="https://github.com/carpenstar/bybitapi-sdk-spot/tree/master/src/Spot/MarketData/BestBidAskPrice/README.md">EN</a>,<a href="https://github.com/carpenstar/bybitapi-sdk-spot/tree/master/src/Spot/MarketData/BestBidAskPrice/README_ru.md">RU</a>
    </td>
  </tr>
  <tr>
    <td>
      <a href="https://github.com/carpenstar/bybitapi-sdk-spot#market-data---instrument-info">Instrument Info</a>
    </td>
    <td><b>publicEndpoint</b></td>
    <td style="text-align: center" align="center"><a href="https://github.com/carpenstar/bybitapi-sdk-spot/tree/master/src/Spot/MarketData/InstrumentInfo">view</a></td>
    <td style="text-align: center" align="center"><a href="https://bybit-exchange.github.io/docs/spot/public/instrument" target="_blank">view</a></td>
    <td style="text-align: center" align="center">
        <a href="https://github.com/carpenstar/bybitapi-sdk-spot/tree/master/src/Spot/MarketData/InstrumentInfo/README.md">EN</a>,<a href="https://github.com/carpenstar/bybitapi-sdk-spot/tree/master/src/Spot/MarketData/InstrumentInfo/README_ru.md">RU</a>
    </td>
  </tr>
  <tr>
    <td>
      <a href="https://github.com/carpenstar/bybitapi-sdk-spot#market-data---kline">Kline</a>
    </td>
    <td><b>publicEndpoint</b></td>
    <td style="text-align: center" align="center"><a href="https://github.com/carpenstar/bybitapi-sdk-spot/tree/master/src/Spot/MarketData/Kline">view</a></td>
    <td style="text-align: center" align="center"><a href="https://bybit-exchange.github.io/docs/spot/public/kline" target="_blank">view</a></td>
    <td style="text-align: center" align="center">
        <a href="https://github.com/carpenstar/bybitapi-sdk-spot/tree/master/src/Spot/MarketData/Kline/README.md">EN</a>,<a href="https://github.com/carpenstar/bybitapi-sdk-spot/tree/master/src/Spot/MarketData/Kline/README_ru.md">RU</a>
    </td>
  </tr>
  <tr>
    <td>
      <a href="https://github.com/carpenstar/bybitapi-sdk-spot#market-data---last-traded-price">Last Traded Price</a>
    </td>
    <td><b>publicEndpoint</b></td>
    <td style="text-align: center" align="center"><a href="https://github.com/carpenstar/bybitapi-sdk-spot/tree/master/src/Spot/MarketData/LastTradedPrice">view</a></td>
    <td style="text-align: center" align="center"><a href="https://bybit-exchange.github.io/docs/spot/public/last-price" target="_blank">view</a></td>
    <td style="text-align: center" align="center">
        <a href="https://github.com/carpenstar/bybitapi-sdk-spot/tree/master/src/Spot/MarketData/LastTradedPrice/README.md">EN</a>,<a href="https://github.com/carpenstar/bybitapi-sdk-spot/tree/master/src/Spot/MarketData/LastTradedPrice/README_ru.md">RU</a>
    </td>
  </tr>
  <tr>
    <td>
      <a href="https://github.com/carpenstar/bybitapi-sdk-spot#market-data---merged-order-book">Merged Order Book</a>
    </td>
    <td><b>publicEndpoint</b></td>
    <td style="text-align: center" align="center"><a href="https://github.com/carpenstar/bybitapi-sdk-spot/tree/master/src/Spot/MarketData/MergedOrderBook">view</a></td>
    <td style="text-align: center" align="center"><a href="https://bybit-exchange.github.io/docs/spot/public/merge-depth" target="_blank">view</a></td>
    <td style="text-align: center" align="center">
        <a href="https://github.com/carpenstar/bybitapi-sdk-spot/tree/master/src/Spot/MarketData/MergedOrderBook/README.md">EN</a>,<a href="https://github.com/carpenstar/bybitapi-sdk-spot/tree/master/src/Spot/MarketData/MergedOrderBook/README_ru.md">RU</a>
    </td>
  </tr>
  <tr>
    <td>
      <a href="https://github.com/carpenstar/bybitapi-sdk-spot#market-data---public-trading-records">Public Trading Records</a>
    </td>
    <td><b>publicEndpoint</b></td>
    <td style="text-align: center" align="center"><a href="https://github.com/carpenstar/bybitapi-sdk-spot/tree/master/src/Spot/MarketData/PublicTradingRecords">view</a></td>
    <td style="text-align: center" align="center"><a href="https://bybit-exchange.github.io/docs/spot/public/recent-trade" target="_blank">view</a></td>
    <td style="text-align: center" align="center">
        <a href="https://github.com/carpenstar/bybitapi-sdk-spot/tree/master/src/Spot/MarketData/PublicTradingRecords/README.md">EN</a>,<a href="https://github.com/carpenstar/bybitapi-sdk-spot/tree/master/src/Spot/MarketData/PublicTradingRecords/README_ru.md">RU</a>
    </td>
  </tr>
  <tr>
    <td>
      <a href="https://github.com/carpenstar/bybitapi-sdk-spot#market-data---tickers">Tickers</a>
    </td>
    <td><b>publicEndpoint</b></td>
    <td style="text-align: center" align="center"><a href="https://github.com/carpenstar/bybitapi-sdk-spot/tree/master/src/Spot/MarketData/Tickers">view</a></td>
    <td style="text-align: center" align="center"><a href="https://bybit-exchange.github.io/docs/spot/public/tickers" target="_blank">view</a></td>
    <td style="text-align: center" align="center">
        <a href="https://github.com/carpenstar/bybitapi-sdk-spot/tree/master/src/Spot/MarketData/Tickers/README.md">EN</a>,<a href="https://github.com/carpenstar/bybitapi-sdk-spot/tree/master/src/Spot/MarketData/Tickers/README_ru.md">RU</a>
    </td>
  </tr>
  <tr>
    <td>
      <a href="https://github.com/carpenstar/bybitapi-sdk-spot#market-data---order-book">Order Book</a>
    </td>
    <td><b>publicEndpoint</b></td>
    <td style="text-align: center" align="center"><a href="https://github.com/carpenstar/bybitapi-sdk-spot/tree/master/src/Spot/MarketData/OrderBook">view</a></td>
    <td style="text-align: center" align="center"><a href="https://bybit-exchange.github.io/docs/spot/public/depth" target="_blank">view</a></td>
    <td style="text-align: center" align="center">
        <a href="https://github.com/carpenstar/bybitapi-sdk-spot/tree/master/src/Spot/MarketData/OrderBook/README.md">EN</a>,<a href="https://github.com/carpenstar/bybitapi-sdk-spot/tree/master/src/Spot/MarketData/OrderBook/README_ru.md">RU</a>
    </td>
  </tr>

  <tr>
    <th colspan="5" style="text-align: left; font-weight: bold">TRADE</th>
  </tr>
  <tr>
    <th style="text-align: center; font-weight: bold">Endpoint</th>
    <th style="text-align: center; font-weight: bold">Access</th>
    <th style="text-align: center; font-weight: bold">View</th>
    <th style="text-align: center; font-weight: bold">Official documentation</th>
    <th style="text-align: center; font-weight: bold">Language</th>
  </tr>
  <tr>
    <td>
      <a href="https://github.com/carpenstar/bybitapi-sdk-spot#trade---place-order">Place Order</a>
    </td>
    <td><b>privateEndpoint</b></td>
    <td style="text-align: center" align="center"><a href="https://github.com/carpenstar/bybitapi-sdk-spot/tree/master/src/Spot/Trade/PlaceOrder">view</a></td>
    <td style="text-align: center" align="center"><a href="https://bybit-exchange.github.io/docs/spot/trade/place-order" target="_blank">view</a></td>
    <td style="text-align: center" align="center">
        <a href="">EN</a>,
        <a href="">RU</a>
    </td>
  </tr>
  <tr>
    <td>
      <a href="https://github.com/carpenstar/bybitapi-sdk-spot#trade---get-order">Get Order</a>
    </td>
    <td><b>privateEndpoint</b></td>
    <td style="text-align: center" align="center"><a href="https://github.com/carpenstar/bybitapi-sdk-spot/tree/master/src/Spot/Trade/GetOrder">view</a></td>
    <td style="text-align: center" align="center"><a href="https://bybit-exchange.github.io/docs/spot/trade/get-order" target="_blank">view</a></td>
    <td style="text-align: center" align="center">
        <a href="">EN</a>,
        <a href="">RU</a>
    </td>
  </tr>
  <tr>
    <td>
      <a href="https://github.com/carpenstar/bybitapi-sdk-spot#trade---cancel-order">Cancel Order</a>
    </td>
    <td><b>privateEndpoint</b></td>
    <td style="text-align: center" align="center"><a href="https://github.com/carpenstar/bybitapi-sdk-spot/tree/master/src/Spot/Trade/CancelOrder">view</a></td>
    <td style="text-align: center" align="center"><a href="https://bybit-exchange.github.io/docs/spot/trade/cancel" target="_blank">view</a></td>
    <td style="text-align: center" align="center">
        <a href="">EN</a>,
        <a href="">RU</a>
    </td>
  </tr>
  <tr>
    <td>
      <a href="">Batch Cancel Order</a>
    </td>
    <td><b>privateEndpoint</b></td>
    <td style="text-align: center" align="center"><a href="https://github.com/carpenstar/bybitapi-sdk-spot/tree/master/src/Spot/Trade/BatchCancelOrder">view</a></td>
    <td style="text-align: center" align="center"><a href="https://bybit-exchange.github.io/docs/spot/trade/batch-cancel" target="_blank">view</a></td>
    <td style="text-align: center" align="center">
        <a href="">EN</a>,
        <a href="">RU</a>
    </td>
  </tr>
  <tr>
    <td>
      <a href="">Batch Cancel Order By Id</a>
    </td>
    <td><b>privateEndpoint</b></td>
    <td style="text-align: center" align="center"><a href="https://github.com/carpenstar/bybitapi-sdk-spot/tree/master/src/Spot/Trade/BatchCancelOrderById">view</a></td>
    <td style="text-align: center" align="center"><a href="https://bybit-exchange.github.io/docs/spot/trade/cancel-by-id" target="_blank">view</a></td>
    <td style="text-align: center" align="center">
        <a href="">EN</a>,
        <a href="">RU</a>
    </td>
  </tr>
  <tr>
    <td>
      <a href="">Open Orders</a>
    </td>
    <td><b>privateEndpoint</b></td>
    <td style="text-align: center" align="center"><a href="https://github.com/carpenstar/bybitapi-sdk-spot/tree/master/src/Spot/Trade/OpenOrders">view</a></td>
    <td style="text-align: center" align="center"><a href="https://bybit-exchange.github.io/docs/spot/trade/open-order" target="_blank">view</a></td>
    <td style="text-align: center" align="center">
        <a href="">EN</a>,
        <a href="">RU</a>
    </td>
  </tr>
  <tr>
    <td>
      <a href="">Order History</a>
    </td>
    <td><b>privateEndpoint</b></td>
    <td style="text-align: center" align="center"><a href="https://github.com/carpenstar/bybitapi-sdk-spot/tree/master/src/Spot/Trade/OrderHistory">view</a></td>
    <td style="text-align: center" align="center"><a href="https://bybit-exchange.github.io/docs/spot/trade/order-history" target="_blank">view</a></td>
    <td style="text-align: center" align="center">
        <a href="">EN</a>,
        <a href="">RU</a>
    </td>
  </tr>
  <tr>
    <td>
      <a href="">Trade History</a>
    </td>
    <td><b>privateEndpoint</b></td>
    <td style="text-align: center" align="center"><a href="https://github.com/carpenstar/bybitapi-sdk-spot/tree/master/src/Spot/Trade/TradeHistory">view</a></td>
    <td style="text-align: center" align="center"><a href="https://bybit-exchange.github.io/docs/spot/trade/my-trades" target="_blank">view</a></td>
    <td style="text-align: center" align="center">
        <a href="">EN</a>,
        <a href="">RU</a>
    </td>
  </tr>

  <tr>
    <th colspan="5" style="text-align: left; font-weight: bold">LEVERAGE TOKEN</th>
  </tr>
  <tr>
    <th style="text-align: center; font-weight: bold">Endpoint</th>
    <th style="text-align: center; font-weight: bold">Access</th>
    <th style="text-align: center; font-weight: bold">View</th>
    <th style="text-align: center; font-weight: bold">Official documentation</th>
    <th style="text-align: center; font-weight: bold">Language</th>
  </tr>
  <tr>
    <td>
      <a href="">All Asset Info</a>
    </td>
    <td><b>publicEndpoint</b></td>
    <td style="text-align: center" align="center"><a href="https://github.com/carpenstar/bybitapi-sdk-spot/tree/master/src/Spot/LeverageToken/AllAssetInfo">view</a></td>
    <td style="text-align: center" align="center"><a href="https://bybit-exchange.github.io/docs/spot/etp/asset-info" target="_blank">view</a></td>
    <td style="text-align: center" align="center">
        <a href="">EN</a>,
        <a href="">RU</a>
    </td>
  </tr>
  <tr>
    <td>
      <a href="">Market Info</a>
    </td>
    <td><b>publicEndpoint</b></td>
    <td style="text-align: center" align="center"><a href="https://github.com/carpenstar/bybitapi-sdk-spot/tree/master/src/Spot/LeverageToken/MarketInfo">view</a></td>
    <td style="text-align: center" align="center"><a href="https://bybit-exchange.github.io/docs/spot/etp/market-info" target="_blank">view</a></td>
    <td style="text-align: center" align="center">
        <a href="">EN</a>,
        <a href="">RU</a>
    </td>
  </tr>
  <tr>
    <td>
      <a href="">Purchase</a>
    </td>
    <td><b>publicEndpoint</b></td>
    <td style="text-align: center" align="center"><a href="https://github.com/carpenstar/bybitapi-sdk-spot/tree/master/src/Spot/LeverageToken/Purchase">view</a></td>
    <td style="text-align: center" align="center"><a href="https://bybit-exchange.github.io/docs/spot/etp/purchase" target="_blank">view</a></td>
    <td style="text-align: center" align="center">
        <a href="">EN</a>,
        <a href="">RU</a>
    </td>
  </tr>
  <tr>
    <td>
      <a href="">Purchase Redeem History</a>
    </td>
    <td><b>publicEndpoint</b></td>
    <td style="text-align: center" align="center"><a href="https://github.com/carpenstar/bybitapi-sdk-spot/tree/master/src/Spot/LeverageToken/PurchaseRedeemHistory">view</a></td>
    <td style="text-align: center" align="center"><a href="https://bybit-exchange.github.io/docs/spot/etp/order-history" target="_blank">view</a></td>
    <td style="text-align: center" align="center">
        <a href="">EN</a>,
        <a href="">RU</a>
    </td>
  </tr>
  <tr>
    <td>
      <a href="">Redeem</a>
    </td>
    <td><b>publicEndpoint</b></td>
    <td style="text-align: center" align="center"><a href="https://github.com/carpenstar/bybitapi-sdk-spot/tree/master/src/Spot/LeverageToken/Redeem">view</a></td>
    <td style="text-align: center" align="center"><a href="https://bybit-exchange.github.io/docs/spot/etp/redeem" target="_blank">view</a></td>
    <td style="text-align: center" align="center">
        <a href="">EN</a>,
        <a href="">RU</a>
    </td>
  </tr>
  <tr>
    <th colspan="5" style="text-align: left; font-weight: bold">ACCOUNT</th>
  </tr>
  <tr>
    <th style="text-align: center; font-weight: bold">Endpoint</th>
    <th style="text-align: center; font-weight: bold">Access</th>
    <th style="text-align: center; font-weight: bold">View</th>
    <th style="text-align: center; font-weight: bold">Official documentation</th>
    <th style="text-align: center; font-weight: bold">Language</th>
  </tr>
  <tr>
    <td>
      <a href="">Wallet Balance</a>
    </td>
    <td><b>privateEndpoint</b></td>
    <td style="text-align: center" align="center"><a href="https://github.com/carpenstar/bybitapi-sdk-spot/tree/master/src/Spot/Account/WalletBalance">view</a></td>
    <td style="text-align: center" align="center"><a href="https://bybit-exchange.github.io/docs/spot/wallet" target="_blank">view</a></td>
    <td style="text-align: center" align="center">
        <a href="">EN</a>,
        <a href="">RU</a>
    </td>
  </tr>
</table>