[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/carpenstar/bybitapi-sdk-spot/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/carpenstar/bybitapi-sdk-spot/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/carpenstar/bybitapi-sdk-spot/badges/build.png?b=master)](https://scrutinizer-ci.com/g/carpenstar/bybitapi-sdk-spot/build-status/master)
[![Code Intelligence Status](https://scrutinizer-ci.com/g/carpenstar/bybitapi-sdk-spot/badges/code-intelligence.svg?b=master)](https://scrutinizer-ci.com/code-intelligence)
# ByBitAPI - spot-trading package

> [!IMPORTANT]
> This is an unofficial SDK for interaction with the ByBit exchange. The development is carried out by one person solely on enthusiasm and as far as possible
For all questions, you can contact me in Issues, by email: mighty.vlad@gmail.com or in telegram: @novisad0189

> [!IMPORTANT]
> This package is an extension of [bybitapi-sdk-core](https://github.com/carpenstar/bybitapi-sdk-core)


## Requirements

- PHP >= 7.4

## Install

```sh 
composer require carpenstar/bybitapi-sdk-spot:3.*
```

## Available endpoints:

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
      <a href="https://github.com/carpenstar/bybitapi-sdk-spot/tree/master/src/Spot/MarketData/BestBidAskPrice">Best Bid Ask Price</a>
    </td>
    <td><b>publicEndpoint</b></td>
    <td style="text-align: center" align="center"><a href="https://github.com/carpenstar/bybitapi-sdk-spot/tree/master/src/Spot/MarketData/BestBidAskPrice">view</a></td>
    <td style="text-align: center" align="center"><a href="https://bybit-exchange.github.io/docs/spot/public/bid-ask" target="_blank">view</a></td>
    <td style="text-align: center" align="center">
        <a href="https://github.com/carpenstar/bybitapi-sdk-spot/tree/master/src/Spot/MarketData/BestBidAskPrice/README.md">EN</a>,
        <a href="https://github.com/carpenstar/bybitapi-sdk-spot/tree/master/src/Spot/MarketData/BestBidAskPrice/README_ru.md">RU</a>
    </td>
  </tr>
  <tr>
    <td>
      <a href="https://github.com/carpenstar/bybitapi-sdk-spot/tree/master/src/Spot/MarketData/InstrumentInfo">Instrument Info</a>
    </td>
    <td><b>publicEndpoint</b></td>
    <td style="text-align: center" align="center"><a href="https://github.com/carpenstar/bybitapi-sdk-spot/tree/master/src/Spot/MarketData/InstrumentInfo">view</a></td>
    <td style="text-align: center" align="center"><a href="https://bybit-exchange.github.io/docs/spot/public/instrument" target="_blank">view</a></td>
    <td style="text-align: center" align="center">
        <a href="https://github.com/carpenstar/bybitapi-sdk-spot/tree/master/src/Spot/MarketData/InstrumentInfo/README.md">EN</a>,
        <a href="https://github.com/carpenstar/bybitapi-sdk-spot/tree/master/src/Spot/MarketData/InstrumentInfo/README_ru.md">RU</a>
    </td>
  </tr>
  <tr>
    <td>
      <a href="https://github.com/carpenstar/bybitapi-sdk-spot/tree/master/src/Spot/MarketData/Kline">Kline</a>
    </td>
    <td><b>publicEndpoint</b></td>
    <td style="text-align: center" align="center"><a href="https://github.com/carpenstar/bybitapi-sdk-spot/tree/master/src/Spot/MarketData/Kline">view</a></td>
    <td style="text-align: center" align="center"><a href="https://bybit-exchange.github.io/docs/spot/public/kline" target="_blank">view</a></td>
    <td style="text-align: center" align="center">
        <a href="https://github.com/carpenstar/bybitapi-sdk-spot/tree/master/src/Spot/MarketData/Kline/README.md">EN</a>,
        <a href="https://github.com/carpenstar/bybitapi-sdk-spot/tree/master/src/Spot/MarketData/Kline/README_ru.md">RU</a>
    </td>
  </tr>
  <tr>
    <td>
      <a href="https://github.com/carpenstar/bybitapi-sdk-spot/tree/master/src/Spot/MarketData/LastTradedPrice">Last Traded Price</a>
    </td>
    <td><b>publicEndpoint</b></td>
    <td style="text-align: center" align="center"><a href="https://github.com/carpenstar/bybitapi-sdk-spot/tree/master/src/Spot/MarketData/LastTradedPrice">view</a></td>
    <td style="text-align: center" align="center"><a href="https://bybit-exchange.github.io/docs/spot/public/last-price" target="_blank">view</a></td>
    <td style="text-align: center" align="center">
        <a href="https://github.com/carpenstar/bybitapi-sdk-spot/tree/master/src/Spot/MarketData/LastTradedPrice/README.md">EN</a>,
        <a href="https://github.com/carpenstar/bybitapi-sdk-spot/tree/master/src/Spot/MarketData/LastTradedPrice/README_ru.md">RU</a>
    </td>
  </tr>
  <tr>
    <td>
      <a href="https://github.com/carpenstar/bybitapi-sdk-spot/tree/master/src/Spot/MarketData/MergedOrderBook">Merged Order Book</a>
    </td>
    <td><b>publicEndpoint</b></td>
    <td style="text-align: center" align="center"><a href="https://github.com/carpenstar/bybitapi-sdk-spot/tree/master/src/Spot/MarketData/MergedOrderBook">view</a></td>
    <td style="text-align: center" align="center"><a href="https://bybit-exchange.github.io/docs/spot/public/merge-depth" target="_blank">view</a></td>
    <td style="text-align: center" align="center">
        <a href="https://github.com/carpenstar/bybitapi-sdk-spot/tree/master/src/Spot/MarketData/MergedOrderBook/README.md">EN</a>,
        <a href="https://github.com/carpenstar/bybitapi-sdk-spot/tree/master/src/Spot/MarketData/MergedOrderBook/README_ru.md">RU</a>
    </td>
  </tr>
  <tr>
    <td>
      <a href="https://github.com/carpenstar/bybitapi-sdk-spot/tree/master/src/Spot/MarketData/PublicTradingRecords">Public Trading Records</a>
    </td>
    <td><b>publicEndpoint</b></td>
    <td style="text-align: center" align="center"><a href="https://github.com/carpenstar/bybitapi-sdk-spot/tree/master/src/Spot/MarketData/PublicTradingRecords">view</a></td>
    <td style="text-align: center" align="center"><a href="https://bybit-exchange.github.io/docs/spot/public/recent-trade" target="_blank">view</a></td>
    <td style="text-align: center" align="center">
        <a href="https://github.com/carpenstar/bybitapi-sdk-spot/tree/master/src/Spot/MarketData/PublicTradingRecords/README.md">EN</a>,
        <a href="https://github.com/carpenstar/bybitapi-sdk-spot/tree/master/src/Spot/MarketData/PublicTradingRecords/README_ru.md">RU</a>
    </td>
  </tr>
  <tr>
    <td>
      <a href="https://github.com/carpenstar/bybitapi-sdk-spot/tree/master/src/Spot/MarketData/Tickers">Tickers</a>
    </td>
    <td><b>publicEndpoint</b></td>
    <td style="text-align: center" align="center"><a href="https://github.com/carpenstar/bybitapi-sdk-spot/tree/master/src/Spot/MarketData/Tickers">view</a></td>
    <td style="text-align: center" align="center"><a href="https://bybit-exchange.github.io/docs/spot/public/tickers" target="_blank">view</a></td>
    <td style="text-align: center" align="center">
        <a href="https://github.com/carpenstar/bybitapi-sdk-spot/tree/master/src/Spot/MarketData/Tickers/README.md">EN</a>,
        <a href="https://github.com/carpenstar/bybitapi-sdk-spot/tree/master/src/Spot/MarketData/Tickers/README_ru.md">RU</a>
    </td>
  </tr>
  <tr>
    <td>
      <a href="https://github.com/carpenstar/bybitapi-sdk-spot/tree/master/src/Spot/MarketData/OrderBook">Order Book</a>
    </td>
    <td><b>publicEndpoint</b></td>
    <td style="text-align: center" align="center"><a href="https://github.com/carpenstar/bybitapi-sdk-spot/tree/master/src/Spot/MarketData/OrderBook">view</a></td>
    <td style="text-align: center" align="center"><a href="https://bybit-exchange.github.io/docs/spot/public/depth" target="_blank">view</a></td>
    <td style="text-align: center" align="center">
        <a href="https://github.com/carpenstar/bybitapi-sdk-spot/tree/master/src/Spot/MarketData/OrderBook/README.md">EN</a>,
        <a href="https://github.com/carpenstar/bybitapi-sdk-spot/tree/master/src/Spot/MarketData/OrderBook/README_ru.md">RU</a>
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
      <a href="https://github.com/carpenstar/bybitapi-sdk-spot/tree/master/src/Spot/Trade/PlaceOrder">Place Order</a>
    </td>
    <td><b>privateEndpoint</b></td>
    <td style="text-align: center" align="center"><a href="https://github.com/carpenstar/bybitapi-sdk-spot/tree/master/src/Spot/Trade/PlaceOrder">view</a></td>
    <td style="text-align: center" align="center"><a href="https://bybit-exchange.github.io/docs/spot/trade/place-order" target="_blank">view</a></td>
    <td style="text-align: center" align="center">
        <a href="https://github.com/carpenstar/bybitapi-sdk-spot/blob/master/src/Spot/Trade/PlaceOrder/README.md">EN</a>,
        <a href="https://github.com/carpenstar/bybitapi-sdk-spot/blob/master/src/Spot/Trade/PlaceOrder/README_ru.md">RU</a>
    </td>
  </tr>
  <tr>
    <td>
      <a href="https://github.com/carpenstar/bybitapi-sdk-spot/tree/master/src/Spot/Trade/GetOrder">Get Order</a>
    </td>
    <td><b>privateEndpoint</b></td>
    <td style="text-align: center" align="center"><a href="https://github.com/carpenstar/bybitapi-sdk-spot/tree/master/src/Spot/Trade/GetOrder">view</a></td>
    <td style="text-align: center" align="center"><a href="https://bybit-exchange.github.io/docs/spot/trade/get-order" target="_blank">view</a></td>
    <td style="text-align: center" align="center">
        <a href="https://github.com/carpenstar/bybitapi-sdk-spot/blob/master/src/Spot/Trade/GetOrder/README.md">EN</a>,
        <a href="https://github.com/carpenstar/bybitapi-sdk-spot/blob/master/src/Spot/Trade/GetOrder/README_ru.md">RU</a>
    </td>
  </tr>
  <tr>
    <td>
      <a href="https://github.com/carpenstar/bybitapi-sdk-spot/tree/master/src/Spot/Trade/CancelOrder">Cancel Order</a>
    </td>
    <td><b>privateEndpoint</b></td>
    <td style="text-align: center" align="center"><a href="https://github.com/carpenstar/bybitapi-sdk-spot/tree/master/src/Spot/Trade/CancelOrder">view</a></td>
    <td style="text-align: center" align="center"><a href="https://bybit-exchange.github.io/docs/spot/trade/cancel" target="_blank">view</a></td>
    <td style="text-align: center" align="center">
        <a href="https://github.com/carpenstar/bybitapi-sdk-spot/blob/master/src/Spot/Trade/CancelOrder/README.md">EN</a>,
        <a href="https://github.com/carpenstar/bybitapi-sdk-spot/blob/master/src/Spot/Trade/CancelOrder/README_ru.md">RU</a>
    </td>
  </tr>
  <tr>
    <td>
      <a href="https://github.com/carpenstar/bybitapi-sdk-spot/tree/master/src/Spot/Trade/BatchCancelOrder">Batch Cancel Order</a>
    </td>
    <td><b>privateEndpoint</b></td>
    <td style="text-align: center" align="center"><a href="https://github.com/carpenstar/bybitapi-sdk-spot/tree/master/src/Spot/Trade/BatchCancelOrder">view</a></td>
    <td style="text-align: center" align="center"><a href="https://bybit-exchange.github.io/docs/spot/trade/batch-cancel" target="_blank">view</a></td>
    <td style="text-align: center" align="center">
        <a href="https://github.com/carpenstar/bybitapi-sdk-spot/blob/master/src/Spot/Trade/BatchCancelOrder/README.md">EN</a>,
        <a href="https://github.com/carpenstar/bybitapi-sdk-spot/blob/master/src/Spot/Trade/BatchCancelOrder/README_ru.md">RU</a>
    </td>
  </tr>
  <tr>
    <td>
      <a href="https://github.com/carpenstar/bybitapi-sdk-spot/tree/master/src/Spot/Trade/BatchCancelOrderById">Batch Cancel Order By Id</a>
    </td>
    <td><b>privateEndpoint</b></td>
    <td style="text-align: center" align="center"><a href="https://github.com/carpenstar/bybitapi-sdk-spot/tree/master/src/Spot/Trade/BatchCancelOrderById">view</a></td>
    <td style="text-align: center" align="center"><a href="https://bybit-exchange.github.io/docs/spot/trade/cancel-by-id" target="_blank">view</a></td>
    <td style="text-align: center" align="center">
        <a href="https://github.com/carpenstar/bybitapi-sdk-spot/blob/master/src/Spot/Trade/BatchCancelOrderById/README.md">EN</a>,
        <a href="https://github.com/carpenstar/bybitapi-sdk-spot/blob/master/src/Spot/Trade/BatchCancelOrderById/README_ru.md">RU</a>
    </td>
  </tr>
  <tr>
    <td>
      <a href="https://github.com/carpenstar/bybitapi-sdk-spot/tree/master/src/Spot/Trade/OpenOrders">Open Orders</a>
    </td>
    <td><b>privateEndpoint</b></td>
    <td style="text-align: center" align="center"><a href="https://github.com/carpenstar/bybitapi-sdk-spot/tree/master/src/Spot/Trade/OpenOrders">view</a></td>
    <td style="text-align: center" align="center"><a href="https://bybit-exchange.github.io/docs/spot/trade/open-order" target="_blank">view</a></td>
    <td style="text-align: center" align="center">
        <a href="https://github.com/carpenstar/bybitapi-sdk-spot/blob/master/src/Spot/Trade/OpenOrders/README.md">EN</a>,
        <a href="https://github.com/carpenstar/bybitapi-sdk-spot/blob/master/src/Spot/Trade/OpenOrders/README_ru.md">RU</a>
    </td>
  </tr>
  <tr>
    <td>
      <a href="https://github.com/carpenstar/bybitapi-sdk-spot/tree/master/src/Spot/Trade/OrderHistory">Order History</a>
    </td>
    <td><b>privateEndpoint</b></td>
    <td style="text-align: center" align="center"><a href="https://github.com/carpenstar/bybitapi-sdk-spot/tree/master/src/Spot/Trade/OrderHistory">view</a></td>
    <td style="text-align: center" align="center"><a href="https://bybit-exchange.github.io/docs/spot/trade/order-history" target="_blank">view</a></td>
    <td style="text-align: center" align="center">
        <a href="https://github.com/carpenstar/bybitapi-sdk-spot/blob/master/src/Spot/Trade/OrderHistory/README.md">EN</a>,
        <a href="https://github.com/carpenstar/bybitapi-sdk-spot/blob/master/src/Spot/Trade/OrderHistory/README_ru.md">RU</a>
    </td>
  </tr>
  <tr>
    <td>
      <a href="https://github.com/carpenstar/bybitapi-sdk-spot/tree/master/src/Spot/Trade/TradeHistory">Trade History</a>
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
      <a href="https://github.com/carpenstar/bybitapi-sdk-spot/tree/master/src/Spot/LeverageToken/AllAssetInfo">All Asset Info</a>
    </td>
    <td><b>publicEndpoint</b></td>
    <td style="text-align: center" align="center"><a href="https://github.com/carpenstar/bybitapi-sdk-spot/tree/master/src/Spot/LeverageToken/AllAssetInfo">view</a></td>
    <td style="text-align: center" align="center"><a href="https://bybit-exchange.github.io/docs/spot/etp/asset-info" target="_blank">view</a></td>
    <td style="text-align: center" align="center">
      <a href="https://github.com/carpenstar/bybitapi-sdk-spot/blob/master/src/Spot/LeverageToken/AllAssetInfo/README.md">EN</a>
    </td>
  </tr>
  <tr>
    <td>
      <a href="https://github.com/carpenstar/bybitapi-sdk-spot/tree/master/src/Spot/LeverageToken/MarketInfo">Market Info</a>
    </td>
    <td><b>publicEndpoint</b></td>
    <td style="text-align: center" align="center"><a href="https://github.com/carpenstar/bybitapi-sdk-spot/tree/master/src/Spot/LeverageToken/MarketInfo">view</a></td>
    <td style="text-align: center" align="center"><a href="https://bybit-exchange.github.io/docs/spot/etp/market-info" target="_blank">view</a></td>
    <td style="text-align: center" align="center">
        <a href="https://github.com/carpenstar/bybitapi-sdk-spot/blob/master/src/Spot/LeverageToken/MarketInfo/README.md">EN</a>
    </td>
  </tr>
  <tr>
    <td>
      <a href="https://github.com/carpenstar/bybitapi-sdk-spot/tree/master/src/Spot/LeverageToken/Purchase">Purchase</a>
    </td>
    <td><b>publicEndpoint</b></td>
    <td style="text-align: center" align="center"><a href="https://github.com/carpenstar/bybitapi-sdk-spot/tree/master/src/Spot/LeverageToken/Purchase">view</a></td>
    <td style="text-align: center" align="center"><a href="https://bybit-exchange.github.io/docs/spot/etp/purchase" target="_blank">view</a></td>
    <td style="text-align: center" align="center">
       <a href="https://github.com/carpenstar/bybitapi-sdk-spot/blob/master/src/Spot/LeverageToken/Purchase/README.md">EN</a>
    </td>
  </tr>
  <tr>
    <td>
      <a href="https://github.com/carpenstar/bybitapi-sdk-spot/tree/master/src/Spot/LeverageToken/PurchaseRedeemHistory">Purchase Redeem History</a>
    </td>
    <td><b>publicEndpoint</b></td>
    <td style="text-align: center" align="center"><a href="https://github.com/carpenstar/bybitapi-sdk-spot/tree/master/src/Spot/LeverageToken/PurchaseRedeemHistory">view</a></td>
    <td style="text-align: center" align="center"><a href="https://bybit-exchange.github.io/docs/spot/etp/order-history" target="_blank">view</a></td>
    <td style="text-align: center" align="center">
        <a href="https://github.com/carpenstar/bybitapi-sdk-spot/blob/master/src/Spot/LeverageToken/PurchaseRedeemHistory/README.md">EN</a>
    </td>
  </tr>
  <tr>
    <td>
      <a href="https://github.com/carpenstar/bybitapi-sdk-spot/tree/master/src/Spot/LeverageToken/Redeem">Redeem</a>
    </td>
    <td><b>publicEndpoint</b></td>
    <td style="text-align: center" align="center"><a href="https://github.com/carpenstar/bybitapi-sdk-spot/tree/master/src/Spot/LeverageToken/Redeem">view</a></td>
    <td style="text-align: center" align="center"><a href="https://bybit-exchange.github.io/docs/spot/etp/redeem" target="_blank">view</a></td>
    <td style="text-align: center" align="center">
        <a href="https://github.com/carpenstar/bybitapi-sdk-spot/blob/master/src/Spot/LeverageToken/Redeem/README.md">EN</a>
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
      <a href="https://github.com/carpenstar/bybitapi-sdk-spot/tree/master/src/Spot/Account/WalletBalance">Wallet Balance</a>
    </td>
    <td><b>privateEndpoint</b></td>
    <td style="text-align: center" align="center"><a href="https://github.com/carpenstar/bybitapi-sdk-spot/tree/master/src/Spot/Account/WalletBalance">view</a></td>
    <td style="text-align: center" align="center"><a href="https://bybit-exchange.github.io/docs/spot/wallet" target="_blank">view</a></td>
    <td style="text-align: center" align="center">
        <a href="https://github.com/carpenstar/bybitapi-sdk-spot/blob/master/src/Spot/Account/WalletBalance/README.md">EN</a>
    </td>
  </tr>
</table>